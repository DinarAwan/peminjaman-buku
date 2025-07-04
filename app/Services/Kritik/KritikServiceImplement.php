<?php

namespace App\Services\Kritik;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\Kritik\KritikRepository;

class KritikServiceImplement extends ServiceApi implements KritikService{

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
     protected KritikRepository $mainRepository;

    public function __construct(KritikRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
    public function createKritik(array $data){
      return $this->mainRepository->createKritik([
        'nama_pengirim' => $data['nama_pengirim'],
        'kritik_saran' => $data['kritik_saran'],
      ]);
    }

    public function getAllKritik(){
      return $this->mainRepository->getAllKritik()->sortByDesc('created_at');
    }

    public function deleteKritik($id){
      return $this->mainRepository->deleteKritik($id);
    }
    public function show($id){
      return $this->mainRepository->show($id);
    }
}
