<?php

namespace App\Services\Peminjaman;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\Peminjaman\PeminjamanRepository;

class PeminjamanServiceImplement extends ServiceApi implements PeminjamanService{

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
     protected PeminjamanRepository $mainRepository;

    public function __construct(PeminjamanRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
}
