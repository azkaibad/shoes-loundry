<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::select('id', 'name', 'alamat',  'email', 'no_telp', 'role_id')->get();
        return view('admin.user.userlist' , [
            "title" => "userlist",
            "users" => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.adduser', [
            "title" => "adduser"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $valid = $request->validate([
            'name' => 'required|max:255',
            'no_telp' => 'required|min:11|max:20',
            'alamat' => 'required|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
        ]);
        $valid['password'] = bcrypt($valid['password']);
        User::create($valid);
        
        return redirect('/userlist')->with('dtrSuccess', 'User berhasil ditambahkan');
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
        $user = User::find($id);
        return view('admin.user.edituser', compact('user'),[
            "title" => "adduser"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /// Validasi input
        $validasi = $request->validate([
            'name' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_telp' => 'required|min:11|max:20',   
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:255',
        ]);

    // Cari user berdasarkan ID
    $user = User::find($id);

    if ($user) {
        // Update data user
        $user->name = $validasi['name'];
        $user->alamat = $validasi['alamat'];
        $user->no_telp = $validasi['no_telp'];
        $user->email = $validasi['email'];
        $user->password = bcrypt($validasi['password']); 

        // Simpan perubahan
        $user->save();

        return redirect('/userlist')->with('success', 'Data user berhasil diperbarui');
    } else {
        return redirect('/userlist')->with('error', 'User tidak ditemukan');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect('/userlist')->with('deleteSuccess', 'User Berhasil Dihapus');
        } else {
            return redirect('/userlist')->with('deleteError', 'User Gagal dihapus');
        }
    }
}
