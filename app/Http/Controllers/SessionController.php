<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Auth;
use App\Services\User\UserServiceImplement;

class SessionController extends Controller
{
    protected $userService;
    public function __construct(UserServiceImplement $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $sessions = $this->userService->getAllUsers();
        return view('user.index', ['user' => $sessions]);
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        
        if ($this->userService->login($credentials)) {
            return $this->userService->redirectBasedOnRole(Auth::user());
        }
        
        return back()->withErrors(['email' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/sesi');
    }
}
