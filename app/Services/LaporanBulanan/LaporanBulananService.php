<?php

namespace App\Services\LaporanBulanan;

use LaravelEasyRepository\BaseService;

interface LaporanBulananService extends BaseService{

    public function getAllLaporan();
    public function createLaporan(array $data);
    public function getLaporanById($id);
}
