<?php

namespace App\Services\Buku;

use LaravelEasyRepository\BaseService;

interface BukuService extends BaseService{

    public function getAllBuku();
    public function getBukuById($id);

    public function createBuku(array $data);
    public function updateBuku($id, array $data);
    public function deleteBuku($id);
    public function searchBuku($serach);
}
