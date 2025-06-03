<?php

namespace App\Repositories\User;

use LaravelEasyRepository\Repository;

interface UserRepository extends Repository{

    public function getAllUsers();
    public function getUserById($id);
    public function findUserByEmail(string $email);
}
