<?php

namespace App\Services\Kritik;

use LaravelEasyRepository\BaseService;

interface KritikService extends BaseService{

    // Write something awesome :)
    public function createKritik(array $data);
    public function getAllKritik();
    public function deleteKritik($id);
    public function show($id);
}
