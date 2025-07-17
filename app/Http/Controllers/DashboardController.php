<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Services\Buku\BukuService;
use App\Services\User\UserService;
use Illuminate\Support\Facades\DB;
use Hamcrest\Number\OrderingComparison;
use App\Services\Kategori\KategoriService;

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
        $today = Carbon::now();

        $totalBulanIni = DB::table('peminjaman')
        ->whereMonth('tanggal_pinjam', now()->month)
        ->whereYear('tanggal_pinjam', now()->year)
        ->count();

        $data = DB::table('peminjaman')
        ->selectRaw('DATE(tanggal_pinjam) as tanggal, COUNT(*) as total')
        // ->whereMonth('tanggal_pinjam', $today->month)                                                                                                                       //untuk hanya mengambil bulan ini - hilangkan ini jika inginmmengambil data secara penuh
        // ->whereYear('tanggal_pinjam', $today->year)                                                                                                                        //untuk hanya mengambil bulan ini tetapi untuk memastian bulan yang di ambil di tahun ini - hilangkan ini jika inginmmengambil data secara penuh
        ->groupBy('tanggal')
        ->orderBy('tanggal')
        ->get();

        $labels = $data->pluck('tanggal')->map(function ($tanggal){
            return Carbon::parse($tanggal)->translatedFormat('d F Y'); //l d F Y = senin 24 july 20205
        });
        $values = $data->pluck('total');

        return view('dashboard.admin', [
            'buku' => $buku,
            'kategori' => $kategori,
            'users' => $users,
            'peminjaman' => $peminjaman,
            'labels' => $labels,
            'values' => $values,
            'totalBulanIni' => $totalBulanIni
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
