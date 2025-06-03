<?php

namespace App\Repositories\Kategori;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Kategori;

class KategoriRepositoryImplement extends Eloquent implements KategoriRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected Kategori $model;

    public function __construct(Kategori $model)
    {
        $this->model = $model;
    }

    public function getAllKategori()
    {
        return $this->model->all();
    }
    public function getKategoriById($id)
    {
        return $this->model->find($id);
    }
    public function createKategori(array $data)
    {
        return $this->model->create($data);
    }
    public function deleteKategori($id)
    {
        $kategori = $this->model->find($id);
        if ($kategori) {
            return $kategori->delete();
        }
        return null;
    }
}
