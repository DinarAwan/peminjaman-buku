<?php

namespace App\Services\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use LaravelEasyRepository\ServiceApi;
use App\Repositories\User\UserRepository;

class UserServiceImplement extends ServiceApi implements UserService{

    /**
     * set title message api for CRUD
     * @param string $title
     */
     protected string $title = "";
     /**
     * uncomment this to override the default message
     * protected string $create_message = "";
     * protected string $update_message = "";
     * protected string $delete_message = "";
     */

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected UserRepository $mainRepository;

    public function __construct(UserRepository $mainRepository){
      $this->mainRepository = $mainRepository;
    }

    public function getAllUsers(){
        return $this->mainRepository->getAllUsers();
    }
    public function getUserById($id){
        return $this->mainRepository->getUserById($id);
    }
    public function login(array $credentials){
        $user = $this->mainRepository->findUserByEmail($credentials['email']);
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return false;
        }
        Auth::login($user);
        return true;
    }
    public function redirectBasedOnRole($user){
        if ($user->role == 'admin') {
            return redirect('dashboard');
        } elseif ($user->role == 'anggota') {
            return redirect('dashboard-pengguna');
        } else {
            return redirect('dashboard/staf');
        }
    }
    public function logout(){
        Auth::logout();
        return true;
    }

    public function register(array $credentials){
        return $this->mainRepository->register($credentials);
    }
    
}
