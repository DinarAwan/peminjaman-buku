<?php

namespace App\Repositories\Message;

use LaravelEasyRepository\Repository;

interface MessageRepository extends Repository{

    public function getAllPesan();
    public function createPesan(array $data);
}
