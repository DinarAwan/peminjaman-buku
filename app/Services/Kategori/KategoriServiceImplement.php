<?php

namespace App\Services\Kategori;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\Kategori\KategoriRepository;

class KategoriServiceImplement extends ServiceApi implements KategoriService{

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
     protected KategoriRepository $mainRepository;

    public function __construct(KategoriRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getAllKategori()
    {
        return $this->mainRepository->getAllKategori();
    }
    public function getKategoriById($id)
    {
        return $this->mainRepository->getKategoriById($id);
    }
    public function createKategori(array $data)
    {
        return $this->mainRepository->create($data);
    }
    public function deleteKategori($id)
    {
        return $this->mainRepository->delete($id);
    }
}
