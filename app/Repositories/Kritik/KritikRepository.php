<?php

namespace App\Repositories\Kritik;

use LaravelEasyRepository\Repository;

interface KritikRepository extends Repository{

    // Write something awesome :)
    public function createKritik(array $data);
    public function getAllKritik();
    public function deleteKritik($id);
    public function show($id);
}
