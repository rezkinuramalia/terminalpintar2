<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BeritaController;
use Inertia\Inertia;

Route::get('/', function () {
    // Ganti 'Welcome' menjadi 'LandingPage'
    return Inertia::render('LandingPage', [ 
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Tambahkan rute ini untuk halaman daftar berita
Route::get('/berita', function () {
    return Inertia::render('BeritaList');
})->name('berita.index'); // Beri nama untuk kemudahan

// --- RUTE BARU 1 ---
// Rute untuk Halaman Detail Berita (slug dinamis)
Route::get('/berita/{slug}', function () {
    return Inertia::render('BeritaDetail');
})->name('berita.show');

// RUTE API UNTUK LANDING PAGE KITA
Route::get('/api/kegiatan-terbaru', [BeritaController::class, 'getKegiatanTerbaru']);

// RUTE API BARU UNTUK LIST BERITA
Route::get('/api/semua-berita', [BeritaController::class, 'getAllBerita']);

// --- RUTE API BARU 2 ---
// Rute untuk mengambil data detail berita
Route::get('/api/berita/{slug}', [BeritaController::class, 'getBeritaDetail']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
