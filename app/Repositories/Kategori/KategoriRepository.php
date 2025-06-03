<?php

namespace App\Repositories\Kategori;

use LaravelEasyRepository\Repository;

interface KategoriRepository extends Repository{

    public function getAllKategori();
    public function getKategoriById($id);
    public function createKategori(array $data);

    public function deleteKategori($id);
}
