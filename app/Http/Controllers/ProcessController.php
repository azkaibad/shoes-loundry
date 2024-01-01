<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Service;
use App\Models\Sepatu;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Midtrans\Notification;


class ProcessController extends Controller
{
    public function index($status = null){
        $user = Auth::user();
        $services = Service::all();
        $sepatus = Sepatu::all();
        // Mendapatkan pesanan yang terkait dengan pengguna
        $pesanan = $user->pesanan;

        // Filter pesanan berdasarkan status
        $pesanan = $pesanan->where('status', $status);

        return view('process', [
            "title" => "Process",
            "services" => $services,
            "sepatus" => $sepatus,
            "user" => $user,
            "pesanan" => $pesanan,
            "status" => $status,
        ]);
    }

    public function payment($kode_pesanan)
    {
        // Mendapatkan data pesanan berdasarkan kode_pesanan
        $pesanan = Pesanan::where('kode_pesanan', $kode_pesanan)->first();

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production'); // Set to true for production
        \Midtrans\Config::$isSanitized = true; // Set to true if you want to sanitize the field
        \Midtrans\Config::$is3ds = true;


        $params = array(
            'transaction_details' => array(
                'order_id' => $pesanan->kode_pesanan,
            'gross_amount' => $pesanan->total_harga, // Total harga pesanan
            ),
            'customer_details' => array(
                'first_name' => $pesanan->name,
                'phone' => $pesanan->no_telp,
            ),
        );

        // Buat pembayaran Snap
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $services = Service::all();
        // Tampilkan view pembayaran
        return view('payment', [
            "title" => "Transaksi",
            'snapToken' => $snapToken,
            'pesanan' => $pesanan,
            'services' => $services
        ]);
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if ($hashed == $request->signature_key){
            if($request->transaction_status == 'capture' or $request->transaction_status == 'settlement'){
                // $pesanan = Pesanan::find($request->order_id);
                $pesanan = Pesanan::where('kode_pesanan', $request->order_id)->first();
                $pesanan->update(['status' => 'pengambilan']);
                // Log pembaruan status pesanan
                Log::info('Pesanan ' . $request->order_id . ' berhasil diproses dan diupdate ke status pengambilan.');
            }
        }
    }

    public function invoice($kode_pesanan){
        // Mendapatkan data pesanan berdasarkan kode_pesanan
        $pesanan = Pesanan::where('kode_pesanan', $kode_pesanan)->first();
        
        return view('invoice', [
            "title" => "Invoice",
            'pesanan' => $pesanan
        ]);
    }

    public function create($pesanan_id)
    {
        $pesanan = Pesanan::where('id',$pesanan_id)->first();
        return view('reviews', compact('pesanan'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|max:255',
            'pesanan_id' => 'required|exists:pesanans,id',
        ]);

        $validatedData['user_id'] = Auth::id(); // Menyimpan ID user yang memberikan rating

        Review::create($validatedData);

        return redirect('/process/selesai')->with('success', 'Ulasan berhasil ditambahkan!');
    }   

    public function destroy($kode_pesanan)
    {
        $pesanan = Pesanan::where('kode_pesanan',$kode_pesanan)->first();

        if ($pesanan) {
            $pesanan->delete();
            return redirect('/process/tunggu_bayar')->with('deleteSuccess', 'Pesanan Berhasil Dihapus');
        } else {
            return redirect('/process/tunggu_bayar')->with('deleteError', 'Pesanan Gagal dihapus');
        }
    }
}
