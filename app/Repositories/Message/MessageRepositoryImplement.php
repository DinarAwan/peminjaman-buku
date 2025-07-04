<?php

namespace App\Repositories\Message;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Message;

class MessageRepositoryImplement extends Eloquent implements MessageRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected Message $model;

    public function __construct(Message $model)
    {
        $this->model = $model;
    }

    public function getAllPesan(){
        return $this->model->all();
    }
    public function createPesan(array $data){
        $this->model->create($data);
    }
}
