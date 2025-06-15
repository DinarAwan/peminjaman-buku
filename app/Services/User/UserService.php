<?php

namespace App\Services\User;

use LaravelEasyRepository\BaseService;

interface UserService extends BaseService{

    public function getAllUsers();
    public function getUserById($id);
    public function login(array $credentials);
    public function logout();

    public function register(array $credentials);
}
