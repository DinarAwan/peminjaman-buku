<?php

namespace App\Repositories\Kritik;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Kritik;

class KritikRepositoryImplement extends Eloquent implements KritikRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected Kritik $model;

    public function __construct(Kritik $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
    public function createKritik(array $data){
        return $this->model->create($data);
    }
    public function getAllKritik(){
        return $this->model->all();
    }
    public function deleteKritik($id){
        return $this->model->where('id', $id)->delete();
    }
    public function show($id){
        return $this->model->find($id);
    }
}
