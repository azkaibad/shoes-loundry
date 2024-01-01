<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\SepatuController;
use App\Http\Controllers\ServiceUserController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Models\Service;
use App\Models\Sepatu;
use App\Models\Review;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $services = Service::all();
    $sepatus = Sepatu::all();
    $reviews = Review::all();
    return view('home', [
        "title" => "Home",
        'services'=> $services,
        'sepatus' =>$sepatus,
        'reviews' => $reviews
    ]);
});

Route::get('/about', function () {
    $services = Service::all();
    return view('about', [
        "title" => "About",
        'services'=> $services
    ]);
});

Route::get('/service', [ServiceUserController::class, 'index']);
Route::get('/service/{id}', [ServiceUserController::class, 'detail'])->name('service.detail');





Route::get('/testimoni', function () {
    $services = Service::all();
    $reviews = Review::all();
    return view('testimoni', [
        "title" => "Testimoni",
        'services'=> $services,
        'reviews' => $reviews
    ]);
});


Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    //order
    Route::get('/order', [OrderController::class, 'index']);
    Route::post('/order', [OrderController::class, 'store']);
    
    //profile
    Route::resource('/profile', ProfileController::class);
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

    //proses
    Route::get('/process/{status?}', [ProcessController::class, 'index'])->name('process.index');
    Route::get('/payment/{kode_pesanan}', [ProcessController::class, 'payment'])->name('payment');
    Route::get('/invoice/{kode_pesanan}', [ProcessController::class, 'invoice'])->name('invoice');
    Route::delete('/process/{kode_pesanan}',[ProcessController::class, 'destroy'])->name('destroy');
    //review
    Route::get('/reviews/{pesanan_id}', [ProcessController::class, 'create'])->name('review.create');
    Route::post('/reviews', [ProcessController::class, 'store'])->name('review.store');
});


//jika user belum login
Route::group(['middleware' => ['auth', 'checkrole:1,2']], function(){
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class,'cek']);
});

Route::group(['middleware'=> 'guest'], function(){
    Route::get('/login', [LoginController::class,'index'])->name('login');
    Route::post('/login', [LoginController::class, 'autenticate']);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
});

// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [LoginController::class, 'autenticate']);



Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/admin', [AdminController::class, 'index']);

    Route::resource('/userlist',UserController::class);
    Route::get('/userlist/{id}/edituser', [UserController::class, 'edit']);
    Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('/adduser', [UserController::class, 'create']);
    Route::post('/adduser', [UserController::class, 'store']);
    Route::delete('/users/{user}',[UserController::class, 'destroy'])->name('user.destroy');

    Route::resource('/servicelist', ServiceController::class);
    Route::get('/servicelist/{id}/editservice', [ServiceController::class, 'edit']);
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('service.update');
    Route::get('/addservice', [ServiceController::class, 'create']);
    Route::post('/addservice', [ServiceController::class, 'store']);
    Route::delete('/services/{service}',[ServiceController::class, 'destroy'])->name('service.destroy');

    Route::resource('/pesananlist', PesananController::class);
    Route::get('/pesananlist/{id}/editpesanan', [PesananController::class, 'edit']);
    Route::get('/pesananselesai', [PesananController::class,'selesai']);
    // routes/web.php
    Route::patch('/pesanan/{pesanan}/update-status', [PesananController::class, 'updateStatus'])->name('pesanan.updateStatus');
    Route::put('/pesanans/{pesanan}', [PesananController::class, 'update'])->name('pesanan.update');
    Route::get('/addpesanan', [PesananController::class, 'create']);
    Route::post('/addpesanan', [PesananController::class, 'store']);
    Route::delete('/pesanans/{pesanan}',[PesananController::class, 'destroy'])->name('pesanan.destroy');

    Route::resource('/listsepatu', SepatuController::class);
    Route::get('/listsepatu', [SepatuController::class, 'create']);
    Route::post('/listsepatu', [SepatuController::class, 'store']);
    Route::put('/listsepatu/{sepatu}', [SepatuController::class, 'update'])->name('sepatu.update');
    Route::delete('/listsepatu/{sepatu}',[SepatuController::class, 'destroy'])->name('sepatu.destroy');

    Route::resource('/reviewlist', ReviewController::class);
});

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

//UNTUK ADMIN


