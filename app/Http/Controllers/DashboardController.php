<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Buku\BukuService;
use App\Services\Kategori\KategoriService;
use App\Services\User\UserService;

class DashboardController extends Controller
{
    protected $bukuService;
    protected $kategoriService;
    protected $userService;

    public function __construct(BukuService $bukuService, KategoriService $kategoriService, UserService $userService){
        [
            $this->bukuService = $bukuService,
            $this->kategoriService = $kategoriService,
            $this->userService = $userService
        ];
    }
    public function index(){
        $buku = $this->bukuService->getAllBuku()->count();
        $kategori = $this->kategoriService->getAllKategori()->count();
        $users = $this->userService->getAllUsers()->where('role', '!=', 'admin')->count();
        return view('dashboard.admin', [
            'buku' => $buku,
            'kategori' => $kategori,
            'users' => $users
        ]);
    }

    public function forPengguna(){
        $buku = $this->bukuService->getAllBuku()->count();
        $kategori = $this->kategoriService->getAllKategori()->count();
        return view('pengguna.dashboard.index', [
            'buku' => $buku,
            'kategori' => $kategori
        ]);
    }
}
