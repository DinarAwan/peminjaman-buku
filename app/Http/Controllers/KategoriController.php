<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Kategori\KategoriService;

class KategoriController extends Controller
{
    protected $kategoriservice;

    public function __construct(KategoriService $kategoriservice){
        $this->kategoriservice = $kategoriservice;
    }

    public function index(){
        $kategori = $this->kategoriservice->getAllKategori();
        return view('kategori.index', ['kategori' => $kategori]);
    }
    public function create(){
        return view('kategori.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => ''
        ]);

        $this->kategoriservice->createKategori($data);

        return redirect()->route('kategori.index')->with('success', 'Kategori created successfully.');
    }
    public function delete($id){
        $this->kategoriservice->deleteKategori($id);
        return redirect()->route('kategori.index')->with('success', 'Kategori deleted successfully.');
    }
}
