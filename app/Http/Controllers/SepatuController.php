<?php

namespace App\Http\Controllers;

use App\Models\Sepatu;
use App\Http\Requests\StoreSepatuRequest;
use App\Http\Requests\UpdateSepatuRequest;
use Illuminate\Http\Request;

class SepatuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sepatus = Sepatu::all();
        return view('admin.sepatu.listsepatu', [
            "title" => "userlist",
            "sepatus" => $sepatus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sepatus = Sepatu::all();
        return view('admin.sepatu.listsepatu', [
            "title" => "userlist",
            "sepatus" => $sepatus
        ]);
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sepatu_name' => 'required|max:255',
        ]);

        Sepatu::create($validatedData);


        return redirect('listsepatu')->with('PsnSucces', 'sepatu Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sepatu $sepatu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sepatu $sepatu)
    {
        $sepatus = Sepatu::all();
        return view('admin.sepatu.listsepatu', [
            "title" => "userlist",
            "sepatus" => $sepatus
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /// Validasi input
        $validasi = $request->validate([
            'sepatu_name' => 'required|max:255',
        ]);

    // Cari user berdasarkan ID
    $sepatus = Sepatu::find($id);

    if ($sepatus) {
        // Update data sepatus
        $sepatus->sepatu_name = $validasi['sepatu_name'];


        // Simpan perubahan
        $sepatus->save();

        return redirect('/listsepatu')->with('success', 'Data user berhasil diperbarui');
    } else {
        return redirect('/listsepatu')->with('error', 'User tidak ditemukan');
    }
    }

    
    public function destroy(string $id)
    {
        $sepatu = Sepatu::find($id);

        if ($sepatu) {
            $sepatu->delete();
            return redirect('/listsepatu')->with('deleteSuccess', 'sepatu Berhasil Dihapus');
        } else {
            return redirect('/listsepatu')->with('deleteError', 'sepatu Gagal dihapus');
        }
    }
}
