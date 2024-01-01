<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use App\Models\Service;

class LoginController extends Controller
{
    public function index() 
    {
        $services = Service::all();
        return view('login.index', [
            'title' => 'Login',
            'active' => 'Login',
            'services' => $services
        ]);
    }

    public function autenticate(Request $request)
    {
        //validasi
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->role_id === 1) {
                //jika user pelanggan
                return redirect()->intended('/');
            } else {
                //jika user admin
                return redirect()->intended('/admin');
            }
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
