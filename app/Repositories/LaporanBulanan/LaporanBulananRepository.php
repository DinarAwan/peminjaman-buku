<?php

namespace App\Repositories\LaporanBulanan;

use LaravelEasyRepository\Repository;

interface LaporanBulananRepository extends Repository{

    public function getAllLaporan();
    public function createLaporan(array $data);
    public function getLaporanById($id);

}
