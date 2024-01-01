<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Service;
use App\Models\Sepatu;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanans = Pesanan::all();
        return view('admin.pesanan.pesananlist' , [
            "title" => "Pesananlist",
            "pesanans" => $pesanans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        $sepatus = Sepatu::all();
        return view('admin.pesanan.addpesanan', [
            "title" => "AddPesanan",
            // compact('services'),
            'sepatus'=>$sepatus,
            'services' => $services
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
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
            $nomorUrut = str_pad($nomorUrut, 4, '0', STR_PAD_LEFT); // Menambahkan leading zeros jika diperlukan
        }
        $kodePesanan = $kodeSepatu . $nomorUrut; 

        
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'alamat' => 'required',
            'no_telp' => 'required|unique:pesanans',
            'service_id' => 'required',
            'sepatu_id' => 'required',
            'pick_up_date' => 'required',
            'delivery_date' => 'required',
        ]);

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

        return redirect('pesananlist')->with('PsnSucces', 'Pesanan Berhasil!');
    }

    // app/Http/Controllers/PesananController.php
    public function updateStatus(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'status' => 'required|in:pengambilan,proses,pengiriman,selesai',
        ]);

        $pesanan->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function selesai()
    {
    $pesanans = Pesanan::all();
    $completedPesanan = Pesanan::where('status', 'selesai')->get();

    return view('admin.pesanan.pesananselesai', [
        "title" => "PesananEnd",
        "pesanans" => $pesanans,
        "completedPesanan" => $completedPesanan,
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pesanan = Pesanan::find($id);

        if ($pesanan) {
            $pesanan->delete();
            return redirect('/pesananlist')->with('deleteSuccess', 'Pesanan Berhasil Dihapus');
        } else {
            return redirect('/pesananlist')->with('deleteError', 'Pesanan Gagal dihapus');
        }
    }
}
