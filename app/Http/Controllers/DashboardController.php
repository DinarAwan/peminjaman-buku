<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Buku\BukuService;
use App\Services\Kategori\KategoriService;
use App\Services\User\UserService;
use App\Models\Peminjaman;

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
        $peminjaman = Peminjaman::all()->count();
        return view('dashboard.admin', [
            'buku' => $buku,
            'kategori' => $kategori,
            'users' => $users,
            'peminjaman' => $peminjaman
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

    public function dashboardGuest(Request $request){
        if($request->has('search')){
            $buku = $this->bukuService->searchBuku($request->search);
        }else{
        $buku = $this->bukuService->getAllBuku();
        }
        return view('dashboard.guest-dashboard', ['buku' => $buku]);
    }
}
