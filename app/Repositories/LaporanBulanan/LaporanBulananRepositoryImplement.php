<?php

namespace App\Repositories\LaporanBulanan;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\LaporanBulanan;

class LaporanBulananRepositoryImplement extends Eloquent implements LaporanBulananRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected LaporanBulanan $model;

    public function __construct(LaporanBulanan $model)
    {
        $this->model = $model;
    }

    public function getAllLaporan(){
        return $this->model->all();
    }
    public function createLaporan(array $data){
        return $this->model->create($data);
    }
    public function getLaporanById($id){
        return $this->model->findOrFail($id);
    }
}
