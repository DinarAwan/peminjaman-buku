<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Services\Buku\BukuService;
use Illuminate\Support\Facades\Auth;
use App\Services\Kategori\KategoriService;
use App\Services\User\UserServiceImplement;

class PeminjamanController extends Controller
{
    protected $bukuService;
    protected $kategoriService;
    protected $userService;
    public function __construct(BukuService $bukuService, KategoriService $kategoriService, UserServiceImplement $userService){
        [
            $this->bukuService = $bukuService,
            $this->kategoriService = $kategoriService,
            $this->userService = $userService
        ];
    }
    public function index(Request $request){
        if($request->has('search')){
            $buku = $this->bukuService->searchBuku($request->search);
        }else{
        $buku = $this->bukuService->getAllBuku();
        }
        return view('pengguna.peminjaman.index', ['buku' => $buku]);
    }

    public function peminjaman(Request $request){
        $request->validate([
            'buku_id' => 'required|exists:buku,id',
        ]);
    
        $user = Auth::user();
        $existing = $user->bukuDipinjam()
        ->where('buku_id', $request->buku_id)
        ->whereIn('status', ['dipinjam', 'pending'])
        ->exists();
    
        if ($existing) {
            return back()->with('error', 'Kamu sudah meminjam buku ini.');
        }
    
        $user->bukuDipinjam()->attach($request->buku_id, [
            'tanggal_pinjam' => now(),
            'tanggal_kembali' => now()->addDays(7),
            'status' => 'pending', 
        ]);

        $buku = $user->bukuDipinjam()->where('buku_id', $request->buku_id)->first();
    
        return view('pengguna.peminjaman.tiketPeminjaman', ['user' => $user, 'buku' => $buku])->with('success', 'Buku berhasil dipinjam.');
    }

    public function setujuiPeminjaman(Request $request){
        $userId = $request->user_id;
        $bukuId = $request->buku_id;

        $user = User::findOrFail($userId);

        $peminjaman = $user->bukuDipinjam()->where('buku_id', $bukuId)->wherePivot('status', 'pending')->first();
        if(!$peminjaman){
            return back()->with('error', 'Peminjaman Tidak ditemukan atau sudah di approve');
        }

        $user->bukuDipinjam()->updateExistingPivot($bukuId, [
            'status' => 'dipinjam',
            'tanggal_pinjam' => now(),
            'tanggal_kembali' => now()->addDays(7)
        ]);

        return back()->with('success', 'Berhasil approve Pemnjaman');
    }
    public function tampilkanLogPeminjaman(){
        $peminjaman= Peminjaman::all();
        return view('pengembalian.pengembalian', ['peminjaman' => $peminjaman]);
        
    }
    public function kembalikanBuku(Request $request){
        $userId = $request->user_id;
        $bukuId = $request->buku_id;

        $user = User::findOrFail($userId);

    if (!$user->bukuDipinjam->contains($request->buku_id)) {
        return back()->with('error', 'Kamu tidak sedang meminjam buku ini.');
    }
    $user->bukuDipinjam()->updateExistingPivot($bukuId, [
        'status' => 'dikembalikan',
        'tanggal_kembali' => now(), // optional jika punya kolom ini
    ]);
    return back()->with('success', 'Buku berhasil dikembalikan');
    }
      public function hapusPeminjaman(Request $request)
    {
        $userId = $request->user_id;
        $bukuId = $request->buku_id;
    
        $user = User::findOrFail($userId);
    
        if (!$user->bukuDipinjam()->where('buku_id', $bukuId)->exists()) {
            return back()->with('error', 'Pengguna ini tidak sedang meminjam buku ini.');
        }   
        $user->bukuDipinjam()->detach($bukuId);
        return back()->with('success', 'Buku berhasil dikembalikan.');
    }
    public function detailBuku($id){
        $buku = $this->bukuService->getBukuById($id);
        return view('pengguna.peminjaman.detail-buku', ['buku' => $buku]);
    }

    public function tiketYangDiMiliki(){

        $user = Auth::user();
        $bukuDipinjam = $user->bukuDipinjam()
                        ->withPivot('tanggal_pinjam', 'tanggal_kembali', 'status')->get();

        return view('pengguna.peminjaman.tiket-yang-dimiliki', [
            'user' => $user,
            'bukuDipinjam' => $bukuDipinjam
        ]);
    }

    public function detailTiket($id){
        $user = Auth::user();
        $buku = $user->bukuDipinjam()
        ->where('buku_id', $id)
        ->withPivot('tanggal_pinjam', 'tanggal_kembali', 'status')
        ->first();

        if (!$buku) {
            return back()->with('error', 'Tiket tidak ditemukan atau bukan milik Anda.');
        }
        return view('pengguna.peminjaman.tiketPeminjaman', [
            'user' => $user,
            'buku' => $buku
        ]);
    }

    public function tiketPenggunaToPdf(){

        $mpdf = new Mpdf();
        $mpdf->WriteHTML(
            '<h1>Tiket Peminjaman Buku</h1>'
        );
        $mpdf->Output();
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

// hapus /detach
   // public function kembalikanBuku(Request $request)
    // {
    //     $userId = $request->user_id;
    //     $bukuId = $request->buku_id;
    
    //     $user = User::findOrFail($userId);
    
    //     if (!$user->bukuDipinjam()->where('buku_id', $bukuId)->exists()) {
    //         return back()->with('error', 'Pengguna ini tidak sedang meminjam buku ini.');
    //     }
    
    //     $user->bukuDipinjam()->detach($bukuId);
    
    //     return back()->with('success', 'Buku berhasil dikembalikan.');
    // }
}
