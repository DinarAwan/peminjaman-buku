<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AiController;
use GuzzleHttp\Cookie\SessionCookieJar;
use App\Http\Controllers\BukuController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Contracts\Session\Session;
use App\Http\Controllers\KritikController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\MessageController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [DashboardController::class, 'dashboardGuest'])->name('home');

// untuk admin pengelola buku
Route::get('/buku',[BukuController::class, 'index'])->middleware(AdminMiddleware::class);
Route::get('/buku/create',[BukuController::class, 'create'])->middleware(AdminMiddleware::class);
Route::post('/buku/create',[BukuController::class, 'store'])->middleware(AdminMiddleware::class);
Route::get('/buku/edit{id}',[BukuController::class, 'edit'])->name('buku.edit')->middleware(AdminMiddleware::class);
Route::post('/buku/edit{id}',[BukuController::class, 'update'])->name('buku.update')->middleware(AdminMiddleware::class);
Route::get('/buku/delete{id}',[BukuController::class, 'destroy'])->name('buku.delete')->middleware(AdminMiddleware::class);
Route::get('buku/peminjaman',[BukuController::class, 'peminjaman'])->name('peminjaman.buku')->middleware(AdminMiddleware::class);

//dashboard admin
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(AdminMiddleware::class);
Route::get('/profile-admin', [ProfileController::class, 'profileAdmin']);
Route::get('/edit-profile-admin', [ProfileController::class, 'editProfileAdmin'])->name('edit-profile-admin');
Route::post('/edit-profile-admin', [ProfileController::class, 'updateProfileAdmin'])->name('update-profile-admin');


//untuk admin-pengelola peminjaman
Route::get('log-peminjaman', [PeminjamanController::class, 'tampilkanLogPeminjaman'])->middleware(AdminMiddleware::class);
Route::post('kembalikan-buku', [PeminjamanController::class, 'kembalikanBuku'])->name('kembalikan-buku')->middleware(AdminMiddleware::class);
Route::post('setujui-peminjaman-buku', [PeminjamanController::class, 'setujuiPeminjaman'])->name('setujui-peminjaman-buku')->middleware(AdminMiddleware::class);
Route::post('hapus-peminjaman', [PeminjamanController::class, 'hapusPeminjaman'])->name('hapus-peminjaman')->middleware(AdminMiddleware::class);

// untuk pengguna
Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard-pengguna', [DashboardController::class, 'forPengguna'])->name('dashboard-pengguna');

    Route::get('/kategori',[KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create',[KategoriController::class, 'create']);
    Route::post('/kategori/create',[KategoriController::class, 'store']);
    Route::get('/kategori/delete{id}',[KategoriController::class, 'delete'])->name('kategori.delete');

    Route::get('/user', [SessionController::class, 'index'])->name('user.index');
    Route::get('/user/delete/{id}', [SessionController::class, 'deleteUser'])->name('user.delete');

    Route::get('/buku/peminjaman-pengguna',[PeminjamanController::class, 'index'])->name('peminjaman.buku.pengguna');
    Route::post('pinjam', [PeminjamanController::class, 'peminjaman'])->name('pinjam.buku');
    Route::get('/detail-buku/{id}', [PeminjamanController::class, 'detailBuku'])->name('detail-buku');
    Route::get('tiket', [PeminjamanController::class, 'tiketYangDiMiliki'])->name('tiket-yang-dimiliki');
    Route::get('detail-tiket/{id}', [PeminjamanController::class, 'detailTiket'])->name('tiket.detail');
    Route::get('/pinjam/pdf', [PeminjamanController::class, 'tiketPenggunaToPdf'])->name('tiket-pengguna-to-pdf');

    Route::get('profile-pengguna', [ProfileController::class, 'index']);
    Route::get('edit-profile', [ProfileController::class, 'editProfile'])->name('edit-profile');
    Route::post('update-profile-pengguna', [ProfileController::class, 'updateProfilePengguna'])->name('update-profile-pengguna');
    
    Route::get('/chatbot', [AiController::class, 'index'])->name('chatbot.index');
    Route::post('/tanya-ai', [AIController::class, 'tanyaAi']);

    Route::get('kritik', [KritikController::class, 'index'])->name('kritik.index');
    Route::post('/kirim-kritik', [KritikController::class, 'kirimKritik'])->name('kirim-kritik');
    Route::get('/draft-kritik', [KritikController::class, 'getAllKritik'])->name('darft-kritik');
    Route::get('/delete-kritik/{id}', [KritikController::class, 'deleteKritik'])->name('kritik.delete');
    Route::get('/kritik/detail/{id}', [KritikController::class, 'show'])->name('kritik.detail');

    Route::get('forum', [MessageController::class, 'index'])->name('forum.index');
    Route::post('/forum', [MessageController::class, 'kirimPesan'])->name('forum.kirim-pesan');

});


Route::get('/sesi', [SessionController::class, 'login'])->name('login');
Route::post('/sesi', [SessionController::class, 'authenticate'])->name('authenticate');
Route::get('/sesi/register', [SessionController::class, 'register']);
Route::post('/sesi/create/', [SessionController::class, 'create']);
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');

Route::get('/documentation', [DocumentationController::class, 'index'])->name('documentation.index');
Route::get('/documentation-guest', [DocumentationController::class, 'dockForGuest'])->name('documentation.guest');

