<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\SessionController;
use App\Models\User;
use GuzzleHttp\Cookie\SessionCookieJar;
use Illuminate\Contracts\Session\Session;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});
// untuk admin
Route::get('/buku',[BukuController::class, 'index']);
Route::get('/buku/create',[BukuController::class, 'create']);
Route::post('/buku/create',[BukuController::class, 'store']);
Route::get('/buku/edit{id}',[BukuController::class, 'edit'])->name('buku.edit');
Route::post('/buku/edit{id}',[BukuController::class, 'update'])->name('buku.update');
Route::get('/buku/delete{id}',[BukuController::class, 'destroy'])->name('buku.delete');
Route::get('buku/peminjaman',[BukuController::class, 'peminjaman'])->name('peminjaman.buku');
// untuk pengguna
Route::get('/buku/peminjaman-pengguna',[PeminjamanController::class, 'index'])->name('peminjaman.buku.pengguna');
Route::get('/dashboard-pengguna', [DashboardController::class, 'forPengguna'])->name('dashboard-pengguna');

Route::get('/kategori',[KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create',[KategoriController::class, 'create']);
Route::post('/kategori/create',[KategoriController::class, 'store']);
Route::get('/kategori/delete{id}',[KategoriController::class, 'delete'])->name('kategori.delete');

Route::get('/user', [SessionController::class, 'index'])->name('user.index');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/sesi', [SessionController::class, 'login'])->name('login');
Route::post('/sesi', [SessionController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');

Route::post('pinjam', [PeminjamanController::class, 'peminjaman'])->name('pinjam.buku');
Route::get('log-peminjaman', [PeminjamanController::class, 'tampilkanLogPeminjaman']);
Route::post('kembalikan-buku', [PeminjamanController::class, 'kembalikanBuku'])->name('kembalikan-buku');
Route::get('/detail-buku', [PeminjamanController::class, 'detailBuku']);