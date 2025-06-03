<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Buku\BukuService;
use App\Services\Kategori\KategoriService;

class BukuController extends Controller
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
        return view('buku.index', ['buku' => $buku]);
    }

    public function create(){
        $kategori = $this->kategoriService->getAllKategori();
        return view('buku.create', ['buku' => $kategori]);
    }

    public function store(Request $request){
        $data = $request->all();
        $this->bukuService->createBuku($data);
        return redirect('buku')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit($id){
        $buku = $this->bukuService->getBukuById($id);
        $kategori = $this->kategoriService->getAllKategori();
        return view('buku.edit', ['buku' => $buku, 'kategori' => $kategori]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $this->bukuService->updateBuku($id, $data);
        return redirect('buku')->with('success', 'Buku berhasil diupdate');
    }
    public function destroy($id){
        $this->bukuService->deleteBuku($id);
        return redirect('buku')->with('success', 'Buku berhasil dihapus');
    }

    public function peminjaman(){
        $buku = $this->bukuService->getAllBuku();
        return view('peminjaman.index', ['buku' => $buku]);
    }
    
}
