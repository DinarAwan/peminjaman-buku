<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('profile.profile-pengguna')->with('user', $user);
    }

    public function editProfile(){
        $user = Auth::user();
        return view('profile.edit-profile')->with('user', $user);
    }

    public function updateProfilePengguna(Request $request){
        $user = Auth::user();
        $data = $request->all();
        if($request->hasFile('foto_profile')){
            $request->validate([
                'foto_profile' => 'mimes:jpeg,jpg,png,gif'
            ]);

            $foto_file = $request->file('foto_profile');
            $foto_ekstensi = $foto_file->getClientOriginalExtension();
            $foto_nama = date('ymdhis').".".$foto_ekstensi;
            $foto_file->move(public_path('foto_profile'), $foto_nama);

            $dataFoto = User::find($user->id);
            if ($dataFoto && $dataFoto->foto_profile) {
                File::delete(public_path('foto_profile') . '/' . $dataFoto->foto_profile);
            }
            $data['foto_profile'] = $foto_nama; 
        }

        if($request->hasFile('foto_bacground')){
            $request->validate([
                'foto_bacground' => 'mimes:jpeg,jpg,png,gif'
            ]);

            $foto_file = $request->file('foto_bacground');
            $foto_ekstensi = $foto_file->getClientOriginalExtension();
            $foto_nama = date('ymdhis').".".$foto_ekstensi;
            $foto_file->move(public_path('foto_bacground'), $foto_nama);

            $dataFoto = User::find($user->id);
            if ($dataFoto && $dataFoto->foto_bacground) {
                File::delete(public_path('foto_bacground') . '/' . $dataFoto->foto_bacground);
            }
            $data['foto_bacground'] = $foto_nama; 
        }
        User::where('id', $user->id)->update([
            'foto_profile' => $data['foto_profile'] ?? $user->foto_profile,
            'foto_bacground' => $data['foto_bacground'] ?? $user->foto_bacground,
            'name' => $data['name'] ?? $user->name,
        ]);
        return redirect('profile-pengguna')->with('success', 'Profile berhasil diupdate');
        

    }

    public function profileAdmin(){
        $apaAjah = Auth::user();
        return view('profile.profile-admin')->with('user', $apaAjah);
    }

    public function editProfileAdmin(){
        $user = Auth::user();
        return view('profile.edit-profile-admin')->with('user', $user);
    }

    public function updateProfileAdmin(Request $request){
        $user = Auth::user();
        $data = $request->all();
        if($request->hasFile('foto_profile')){
            $request->validate([
                'foto_profile' => 'mimes:jpeg,jpg,png,gif'
            ]);

            $foto_file = $request->file('foto_profile');
            $foto_ekstensi = $foto_file->getClientOriginalExtension();
            $foto_nama = date('ymdhis').".".$foto_ekstensi;
            $foto_file->move(public_path('foto_profile'), $foto_nama);

            $dataFoto = User::find($user->id);
            if ($dataFoto && $dataFoto->foto_profile) {
                File::delete(public_path('foto_profile') . '/' . $dataFoto->foto_profile);
            }
            $data['foto_profile'] = $foto_nama; 
        }

        if($request->hasFile('foto_bacground')){
            $request->validate([
                'foto_bacground' => 'mimes:jpeg,jpg,png,gif'
            ]);

            $foto_file = $request->file('foto_bacground');
            $foto_ekstensi = $foto_file->getClientOriginalExtension();
            $foto_nama = date('ymdhis').".".$foto_ekstensi;
            $foto_file->move(public_path('foto_bacground'), $foto_nama);

            $dataFoto = User::find($user->id);
            if ($dataFoto && $dataFoto->foto_bacground) {
                File::delete(public_path('foto_bacground') . '/' . $dataFoto->foto_bacground);
            }
            $data['foto_bacground'] = $foto_nama; 
        }
        
        if ($request->filled('password')) {
            $request->validate([
                'current_password' => ['required'],
                'password' => 'min:6|confirmed', 
            ],
        [
                'current_password.required' => 'Password lama harus diisi.',
                'password.min' => 'Password baru minimal 6 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
            ]);
        
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->with('error', 'Password lama salah.');
            }
            if($request->password != $request->password_confirmation){
                return back()->with('error', 'Konfirmasi password tidak cocok.');
            }
            $data['password'] = Hash::make($request->password);
        }

        User::where('id', $user->id)->update([
            'foto_profile' => $data['foto_profile'] ?? $user->foto_profile,
            'foto_bacground' => $data['foto_bacground'] ?? $user->foto_bacground,
            'name' => $data['name'] ?? $user->name,
            'password' => $data['password'] ?? $user->password, 
        ]);
        return redirect('profile-admin')->with('success', 'Profile berhasil diupdate');
    }
}
