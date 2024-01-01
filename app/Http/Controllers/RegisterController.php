<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;

class RegisterController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('register.index',[
            'title' => 'Register',
            'active' => 'register',
            'services'=>$services
        ]);
    }

    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:users',
            'alamat' => 'required|unique:users',
            'no_telp' => 'required|unique:users|min:11|max:20',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        //$request->session()->flash('success', 'Registration successfully! Please Login');

        return redirect('/login')->with('success', 'Registration successfully! Please Login');
    }
}
