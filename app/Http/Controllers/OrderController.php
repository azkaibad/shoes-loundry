<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Service;
use App\Models\Sepatu;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $services = Service::all();
        $sepatus = Sepatu::all();
        return view('order', [
            "title" => "Order",
            "services" => $services,
            "sepatus" => $sepatus
        ]);
    }

    

    public function store(Request $request) 
    {
        $pesanans = Pesanan::latest()->first();
        $kodeSepatu = "SPL";

        if ($pesanans == null) {
            // Kode pertama
            $nomorUrut = "0001";
        } else {
            // Kode berikutnya
            $nomorUrut = (int)substr($pesanans->kode_pesanan, 3, 4) + 1;
            $nomorUrut = str_pad($nomorUrut, 4, '0', STR_PAD_LEFT); 
        }
        $kodePesanan = $kodeSepatu . $nomorUrut; 

        
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'alamat' => 'required',
            'no_telp' => 'required',
            'service_id' => 'required',
            'sepatu_id' => 'required',
            'pick_up_date' => 'required',
            'delivery_date' => 'required',
        ]);
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Menambahkan user_id ke dalam data yang akan disimpan
        $validatedData['user_id'] = $user->id;

        $validatedData['kode_pesanan'] = $kodePesanan;

        // Ambil harga layanan berdasarkan service_id yang dipilih
        $layananTerpilih = Service::findOrFail($validatedData['service_id']);
        $hargaLayanan = $layananTerpilih->harga;

        // Hitung pajak (2% dari total pesanan)
        $jumlahPajak = $hargaLayanan * 0.1;

        // Hitung biaya pengiriman (ganti 10.00 dengan logika biaya pengiriman aktual Anda)
        $biayaPengiriman = 15000; // Ganti dengan logika biaya pengiriman aktual Anda

        // Hitung total harga
        $totalHarga = $hargaLayanan + $jumlahPajak + $biayaPengiriman;

        // Tambahkan nilai yang dihitung ke data yang divalidasi
        $validatedData['pajak'] = $jumlahPajak;
        $validatedData['biaya_pengiriman'] = $biayaPengiriman;
        $validatedData['total_harga'] = $totalHarga;

        Pesanan::create($validatedData);

        //$request->session()->flash('success', 'Registration successfully! Please Login');

        return redirect('/process/tunggu_bayar')->with('PsnSucces', 'Pesanan Berhasil!');
    }
    
}
