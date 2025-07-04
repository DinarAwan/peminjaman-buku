<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Kritik\KritikService;

class KritikController extends Controller
{
    protected $kritikService;

    public function __construct(KritikService $kritikService){
        $this->kritikService = $kritikService;
    }
    public function index(){
        return view('kritik.index');
    }
    public function kirimKritik(Request $request){
        $user = Auth::user();
        $data = $request->validate([
            'kritik_saran' => 'required',    
        ], [
            'kritik_saran.required' => 'Kritik dan saran harus diisi',
        ]);
        $data['nama_pengirim'] = $user ? $user->name : 'Pengunjung';
        $this->kritikService->createKritik($data);
        return redirect()->back()->with('success', 'Kritik dan saran berhasil dikirim');    
    }
    public function getAllKritik(){
        $kritiks = $this->kritikService->getAllKritik();
        return view('kritik.daftar-kritik', [
            'kritiks' => $kritiks
        ]);
    }

    public function deleteKritik($id){
        $this->kritikService->deleteKritik($id);
        return redirect()->back()->with('success', 'Kritik dan saran berhasil dihapus');
    }

    public function show($id){
        $data = $this->kritikService->show($id);
        return view('kritik.detail-kritik', ['data' => $data]);
    }
    
}
