<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Buku\BukuService;
use Illuminate\Support\Facades\File;
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
    public function index(Request $request){
        if($request->has('search')){
            $buku = $this->bukuService->searchBuku($request->search);
        }else{
            $buku = $this->bukuService->getAllBuku();
        }
        return view('buku.index', ['buku' => $buku]);
    }
    public function create(){
        $kategori = $this->kategoriService->getAllKategori();
        return view('buku.create', ['buku' => $kategori]);
    }
    public function store(Request $request){
        $request->validate([
            'foto' => 'mimes:jpeg, jpg, png, gif'
        ]);
        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->getClientOriginalExtension();
        $foto_nama = date('ymdhis').".".$foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);
        
        $data = $request->all();
        $data['foto'] = $foto_nama; 
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
        if($request->hasFile('foto')){
            $request->validate([
                'foto' => 'mimes:jpeg,jpg,png,gif'
            ]);

            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->getClientOriginalExtension();
            $foto_nama = date('ymdhis').".".$foto_ekstensi;
            $foto_file->move(public_path('foto'), $foto_nama);

            $dataFoto = $this->bukuService->getAllBuku()->where('id', $id)->first();
            File::delete(public_path('foto'). '/' . $dataFoto->foto);

            $data['foto'] = $foto_nama; 
        }
        $this->bukuService->updateBuku($id, $data);
        return redirect('buku')->with('success', 'Buku berhasil diupdate');
    }
    public function destroy($id){
        $hapusFotoDiFolder = $this->bukuService->getAllBuku()->where('id', $id)->first;
        File::delete(public_path('foto') . '/' . $hapusFotoDiFolder->foto);
        $this->bukuService->deleteBuku($id);
        return redirect('buku')->with('success', 'Buku berhasil dihapus');
    }
    public function peminjaman(){
        $buku = $this->bukuService->getAllBuku();
        return view('peminjaman.index', ['buku' => $buku]);
    }
}
