<?php

namespace App\Repositories\Buku;

use LaravelEasyRepository\Repository;

interface BukuRepository extends Repository{

    public function getAllBuku();
    public function getBukuById($id);
    public function createBuku(array $data);
    public function updateBuku($id, array $data);
    public function deleteBuku($id);
    public function searchBuku($search);
}
