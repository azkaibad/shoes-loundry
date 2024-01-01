<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.servicelist', [
            "title" => "userlist",
            "services" => $services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.addservice', [
            "title" => "addservice"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedata = $request->validate([
            'service_name' => 'required|max:255',
            'description' => 'required',
            'harga' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        
        $file = $request->file('gambar');
        
        // Periksa apakah file diunggah dengan sukses
        if ($file->isValid()) {
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            
            // Pindahkan file yang diunggah ke direktori public/gambar
            $file->move(public_path('img/services/'), $fileName);
        
            // Perbarui nama file dalam data yang divalidasi
            $validatedata['gambar'] = $fileName;
        
            // Buat rekaman Layanan baru
            Service::create($validatedata);
        
            return redirect('/servicelist')->with('Success', 'Layanan berhasil ditambahkan.');
        } else {
            // Tangani kesalahan unggah file
            return redirect()->back()->withErrors(['Error' => 'Gagal mengunggah gambar.']);
        }
        
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
        $service = Service::find($id);
        return view('admin.service.editservice', compact('service'), [
            "title" => "editservice"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        /// Validasi input
        $validasi = $request->validate([
            'service_name' => 'required|max:255',
            'description' => 'required',
            'harga' => 'required|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);


    if ($request->hasFile('gambar')) {

        // Hapus gambar lama jika ada
        if (file_exists(public_path('img/services/' . $service->gambar))) {
            unlink(public_path('img/services/' . $service->gambar));
        }
        $file = $request->file('gambar');
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path('img/services/'), $fileName);

        // Hapus gambar lama jika perlu
        // unlink(public_path('img/' . $food->gambar_menu));

        $validasi['gambar'] = $fileName;

        // Simpan perubaha
        $service->update($validasi);

        return redirect('/servicelist')->with('success', 'Data layanan berhasil diperbarui');
    } else {
        return redirect('/servicelist')->with('error', 'Layanan tidak ditemukan');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id);

        if ($service) {
            $service->delete();
            return redirect('/servicelist')->with('deleteSuccess', 'Service Berhasil Dihapus');
        } else {
            return redirect('/servicelist')->with('deleteError', 'Service Gagal dihapus');
        }
    }
}
