<?php

use App\Http\Controllers\AiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;
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
Route::get('/sesi/register', [SessionController::class, 'register']);
Route::post('/sesi/create/', [SessionController::class, 'create']);
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');

Route::post('pinjam', [PeminjamanController::class, 'peminjaman'])->name('pinjam.buku');
Route::get('log-peminjaman', [PeminjamanController::class, 'tampilkanLogPeminjaman']);
Route::post('kembalikan-buku', [PeminjamanController::class, 'kembalikanBuku'])->name('kembalikan-buku');
Route::post('setujui-peminjaman-buku', [PeminjamanController::class, 'setujuiPeminjaman'])->name('setujui-peminjaman-buku');
Route::post('hapus-peminjaman', [PeminjamanController::class, 'hapusPeminjaman'])->name('hapus-peminjaman');
Route::get('/detail-buku/{id}', [PeminjamanController::class, 'detailBuku'])->name('detail-buku');
Route::get('tiket', [PeminjamanController::class, 'tiketYangDiMiliki'])->name('tiket-yang-dimiliki');
Route::get('detail-tiket/{id}', [PeminjamanController::class, 'detailTiket'])->name('tiket.detail');
Route::get('/pinjam/pdf', [PeminjamanController::class, 'tiketPenggunaToPdf'])->name('tiket-pengguna-to-pdf');

Route::get('profile-pengguna', [ProfileController::class, 'index']);

Route::get('/chatbot', [AiController::class, 'index'])->name('chatbot.index');
Route::post('/tanya-ai', [AIController::class, 'tanyaAi']);
