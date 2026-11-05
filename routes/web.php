<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Halaman login (nama 'login' dipakai Laravel untuk mengarahkan tamu yang belum login)
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

// Halaman yang hanya boleh dibuka setelah login
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'admin']);

    Route::get('/kasir', function () {
        return view('kasir.beranda');
    });
});