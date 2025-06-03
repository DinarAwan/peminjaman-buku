<?php

namespace App\Repositories\Peminjaman;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Peminjaman;

class PeminjamanRepositoryImplement extends Eloquent implements PeminjamanRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected Peminjaman $model;

    public function __construct(Peminjaman $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}
