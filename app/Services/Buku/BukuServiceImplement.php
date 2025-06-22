<?php

namespace App\Services\Buku;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\Buku\BukuRepository;

class BukuServiceImplement extends ServiceApi implements BukuService{

    /**
     * set title message api for CRUD
     * @param string $title
     */
     protected string $title = "";
     /**
     * uncomment this to override the default message
     
     */
    protected string $create_message = "";
    protected string $update_message = "";
    protected string $delete_message = "";
     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected BukuRepository $mainRepository;

    public function __construct(BukuRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getAllBuku(){
      return $this->mainRepository->getAllBuku();
    }

    public function getBukuById($id){
      return $this->mainRepository->getBukuById($id);
    }

    public function createBuku(array $data){
      return $this->mainRepository->createBuku($data);
    }
    public function updateBuku($id, array $data){
      return $this->mainRepository->updateBuku($id, $data);
    }

    public function deleteBuku($id){
      return $this->mainRepository->deleteBuku($id);
    }
    public function searchBuku($search){
      return $this->mainRepository->searchBuku($search);
    }
}
