<?php

namespace App\Services\Kategori;

use LaravelEasyRepository\BaseService;

interface KategoriService extends BaseService{

    public function getAllKategori();
    public function getKategoriById($id);
    public function createKategori(array $data);
    public function deleteKategori($id);
}
