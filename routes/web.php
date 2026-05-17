<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Alat;
use App\Models\Pemesanan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PesananController;

// ─── HALAMAN UTAMA ──────────────────────────────────
Route::get('/', function () {
    return view('welcome');
});

// ─── AUTH ROUTES ────────────────────────────────────
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ─── PRODUK ─────────────────────────────────────────
Route::get('/produk', function () {
    $alats = Alat::all();
    return view('produk', compact('alats'));
});

// ─── DETAIL PRODUK ──────────────────────────────────
Route::get('/detail/{id}', function ($id) {
    return view('detail', compact('id'));
});

// ─── PANDUAN SEWA ───────────────────────────────────
Route::get('/panduan', function () {
    return view('panduan');
});

// ─── KERANJANG ──────────────────────────────────────
Route::get('/keranjang', function () {
    return view('keranjang');
})->name('keranjang');

// ─── FORMULIR SEWA ──────────────────────────────────
Route::get('/formulir', function () {
    return view('formulir');
});

// ─── PEMBAYARAN (tampilkan halaman) ─────────────────
Route::get('/pembayaran', function () {
    return view('pembayaran');
});

// ─── PESANAN (butuh login) ──────────────────────────
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan');

// ─── API CHECKOUT & BAYAR (butuh login) ─────────────
Route::middleware('auth')->group(function () {
    Route::post('/checkout', [PesananController::class, 'checkout'])->name('checkout');
    Route::post('/bayar', [PesananController::class, 'bayar'])->name('bayar');
});

// ─── LUPA PASSWORD ──────────────────────────────────
Route::get('/lupa-password', function () {
    return view('lupapw');
});

// ─── RESET PASSWORD ─────────────────────────────────
Route::get('/reset-password', function () {
    return view('resetpw');
});

// ═══════════════════════════════════════════════════════
// ─── ADMIN ROUTES ─────────────────────────────────────
// ═══════════════════════════════════════════════════════

// Login Admin (tanpa middleware auth)
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin area (butuh login)
Route::middleware('auth')->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Produk
    Route::get('/produk', [AdminController::class, 'produk'])->name('admin.produk');
    Route::get('/produk/tambah', [AdminController::class, 'tambahProdukForm'])->name('admin.produk.tambah');
    Route::post('/produk/tambah', [AdminController::class, 'tambahProduk'])->name('admin.produk.tambah.post');
    Route::get('/produk/edit/{id}', [AdminController::class, 'editProdukForm'])->name('admin.produk.edit');
    Route::put('/produk/update/{id}', [AdminController::class, 'updateProduk'])->name('admin.produk.update');
    Route::delete('/produk/hapus/{id}', [AdminController::class, 'hapusProduk'])->name('admin.produk.hapus');

    // Pesanan
    Route::get('/pesanan', [AdminController::class, 'pesanan'])->name('admin.pesanan');
    Route::put('/pesanan/{id}/status', [AdminController::class, 'updateStatusPesanan'])->name('admin.pesanan.updateStatus');
});