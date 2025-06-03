<?php

namespace App\Repositories\Buku;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Buku;

class BukuRepositoryImplement extends Eloquent implements BukuRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected Buku $model;

    public function __construct(Buku $model)
    {
        $this->model = $model;
    }

    public function getAllBuku(){
        return $this->model->all();
    }

    public function getBukuById($id){
        return $this->model->find($id);
    }
    public function createBuku(array $data){
        return $this->model->create($data);
    }
    public function updateBuku($id, array $data){
        $buku = $this->getBukuById($id);
        if ($buku) {
            $buku->update($data);
            return $buku;
        }
        return null;
    }

    public function deleteBuku($id){
        $buku = $this->getBukuById($id);
        if ($buku) {
            $buku->delete();
            return true;
        }
        return false;
    }
}
