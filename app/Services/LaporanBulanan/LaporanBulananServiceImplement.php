<?php

namespace App\Services\LaporanBulanan;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\LaporanBulanan\LaporanBulananRepository;

class LaporanBulananServiceImplement extends ServiceApi implements LaporanBulananService{

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
     protected LaporanBulananRepository $mainRepository;

    public function __construct(LaporanBulananRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getAllLaporan(){
      return $this->mainRepository->getAllLaporan();
    }
    public function createLaporan(array $data){
      return $this->mainRepository->createLaporan($data);
    }
    public function getLaporanById($id){
      return $this->mainRepository->getLaporanById($id);
    }
}
