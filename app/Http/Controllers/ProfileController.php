<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
