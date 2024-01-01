<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('profile', [
            "title" => "Profile",
            'services'=> $services
        ]);
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        return view('profile', compact('user'),[
            "title" => "Profile"
        ]);
    }

    public function update(Request $request, string $id)
    {
        // Validasi input
        $validasi = $request->validate([
            'name' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_telp' => 'required',   
            'email' => 'required|email:dns',
            'password' => 'nullable|min:5|max:255',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
    
        // Cari user berdasarkan ID
        $user = User::find($id);
    
        if ($user) {
            // Update data user
            $user->update([
                'name' => $validasi['name'],
                'alamat' => $validasi['alamat'],
                'no_telp' => $validasi['no_telp'],
                'email' => $validasi['email'],
                'password' => isset($validasi['password']) ? bcrypt($validasi['password']) : $user->password,
            ]);
    
            // Handle file upload
            if ($request->hasFile('profile')) {

                // Hapus gambar lama jika ada
                if ($user->profile) {
                    unlink(public_path('img/profiles/' . $user->profile));
                }
                
                $file = $request->file('profile');
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img/profiles/'), $fileName);
        
                // Hapus gambar lama jika perlu
                // unlink(public_path('img/' . $food->gambar_menu));
        
                $validasi['profile'] = $fileName;
    
            }
            $user->profile = $validasi['profile']; // Update the 'profile' column

            $user->save();
    
            return redirect('/profile')->with('success', 'Data user berhasil diperbarui');
        } else {
            return redirect('/profile')->with('error', 'User tidak ditemukan');
        }
    }
    

}
