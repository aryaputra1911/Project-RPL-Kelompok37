<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
});
use App\Models\Alat; // Pastikan model Alat sudah ada

Route::get('/produk', function () {
    // Mengambil semua data alat beserta kategorinya
    $alats = Alat::with('kategori')->get(); 
    return view('produk', compact('alats'));
});

Route::get('/keranjang', function () {
    return view('keranjang');
})->name('keranjang'); // Nama inilah yang dicari oleh Laravel