<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::all();
        $users = User::all();
        return view('admin.index',[
            "title" => "Dashboard",
            'pesanans' => $pesanans,
            'users' => $users
        ]);
    }
}
