<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Services\Buku\BukuService;
use Illuminate\Support\Facades\Auth;
use App\Services\Kategori\KategoriService;

class PeminjamanController extends Controller
{
    protected $bukuService;
    protected $kategoriService;
    public function __construct(BukuService $bukuService, KategoriService $kategoriService){
        [
            $this->bukuService = $bukuService,
            $this->kategoriService = $kategoriService
        ];
    }
    public function index(){
        $buku = $this->bukuService->getAllBuku();
        return view('pengguna.peminjaman.index', ['buku' => $buku]);
    }

    public function peminjaman(Request $request){
        $request->validate([
            'buku_id' => 'required|exists:buku,id',
        ]);
    
        $user = Auth::user();
    
        if ($user->bukuDipinjam->contains($request->buku_id)) {
            return back()->with('error', 'Kamu sudah meminjam buku ini.');
        }
    
        $user->bukuDipinjam()->attach($request->buku_id, [
            'tanggal_pinjam' => now(),
            'tanggal_kembali' => now()->addDays(7),
            'status' => 'dipinjam', 
        ]);
    
        return back()->with('success', 'Buku berhasil dipinjam.');
    }
    

    public function tampilkanLogPeminjaman(){
        $peminjaman= Peminjaman::all();
        return view('pengembalian.pengembalian', ['peminjaman' => $peminjaman]);
        
    }
    public function kembalikanBuku(Request $request)
    {
        $userId = $request->user_id;
        $bukuId = $request->buku_id;
    
        $user = User::findOrFail($userId);
    
        // Cek apakah user memang meminjam buku ini
        if (!$user->bukuDipinjam()->where('buku_id', $bukuId)->exists()) {
            return back()->with('error', 'Pengguna ini tidak sedang meminjam buku ini.');
        }
    
        $user->bukuDipinjam()->detach($bukuId);
    
        return back()->with('success', 'Buku berhasil dikembalikan.');
    }

    public function detailBuku(){
        $buku = $this->bukuService->getAllBuku();
        return view('pengguna.peminjaman.detail-buku', ['buku' => $buku]);
    }
    



// dettach
    // public function kembalikanBuku(Request $request){
    //     $user = Auth::user();
    //     if (!$user->bukuDipinjam->contains($request->buku_id)) {
    //         return back()->with('error', 'Kamu tidak sedang meminjam buku ini.');
    //     }
    //     $user->bukuDipinjam()->detach($request->buku_id);
    //     return back()->with('success', 'Buku berhasil dikembalikan.');
    // }

// update status 
    // public function kembalikanBuku(Request $request){
    // $user = Auth::user();

    // if (!$user->bukuDipinjam->contains($request->buku_id)) {
    //     return back()->with('error', 'Kamu tidak sedang meminjam buku ini.');
    // }

    // $user->bukuDipinjam()->updateExistingPivot($request->buku_id, [
    //     'status' => 'dikembalikan',
    //     'tanggal_kembali' => now(), // optional jika punya kolom ini
    // ]);

    // return back()->with('success', 'Buku berhasil dikembalikan.' ?? 'error', 'entah kenapa aku juga bingung');
    // }
}
