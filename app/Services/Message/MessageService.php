<?php

namespace App\Services\Message;

use LaravelEasyRepository\BaseService;

interface MessageService extends BaseService{

    // Write something awesome :)
    public function getAllPesan();
    public function createPesan(array $data);
}
