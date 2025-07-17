<?php

namespace App\Http\Controllers;

use App\Services\LaporanBulanan\LaporanBulananService;
use Illuminate\Http\Request;

class LaporanBulananController extends Controller
{
    protected $laporanService;
    public function __construct(LaporanBulananService $laporanBulananService){
        $this->laporanService = $laporanBulananService;
    }
    
    public function index(){
        $laporan = $this->laporanService->getAllLaporan();
        return view('laporan_bulanan.index', ['laporan' => $laporan]);
    }
    public function create(){
        return view('laporan_bulanan.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'tahun' => 'required|numeric',
            'bulan' => 'required',
            'jumlah_peminjaman' => 'required|numeric',
            'jumlah_buku_belum_kembali' => 'required|numeric',
            'deskripsi' => ''
        ],[
            'tahun.required' => 'tahun wajib di isi',
            'tahun.numeric' => 'tahun hanya menerima dalam bentuk angka',
            'bulan.required' => 'Bulan harus di isi',
            'jumlah_peminjaman.required' => 'jumlah pinjaman harus di isi',
            'jumlah_peminjaman.numeric' => 'jumlah pinjaman hanya menerima dalam format angka',
            'jumlah_buku_belum_kembali.required' => 'Jumlah buku yang belum di kembalikan harus di isi',
            'jumlah_buku_belum_kembali.numeric' => 'jumlah buku yang belum dikembalikan haris berformat angka',
        ]);

        $this->laporanService->createLaporan($data);
        return redirect('laporan-bulanan')->with('success', 'Laporan bulan ini berhasil di input ke sistem');
    }

    public function show($id){
        $laporan = $this->laporanService->getLaporanById($id);
        return view('laporan_bulanan.show', ['laporan' => $laporan]);
    }
}
