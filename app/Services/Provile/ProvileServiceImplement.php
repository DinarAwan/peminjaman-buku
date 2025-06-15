<?php

namespace App\Services\Provile;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\Provile\ProvileRepository;

class ProvileServiceImplement extends ServiceApi implements ProvileService{

    /**
     * set title message api for CRUD
     * @param string $title
     */
     protected string $title = "";
     /**
     * uncomment this to override the default message
     * protected string $create_message = "";
     * protected string $update_message = "";
     * protected string $delete_message = "";
     */

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected ProvileRepository $mainRepository;

    public function __construct(ProvileRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
}
