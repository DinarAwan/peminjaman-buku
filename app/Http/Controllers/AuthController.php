<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {   
        $data = User::all();
        return view('user.index', ['data' => $data]);
    }
}
