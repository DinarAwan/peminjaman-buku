<?php

namespace App\Repositories\Profile;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Profile;

class ProfileRepositoryImplement extends Eloquent implements ProfileRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected Profile $model;

    public function __construct(Profile $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}
