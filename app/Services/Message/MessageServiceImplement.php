<?php

namespace App\Services\Message;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\Message\MessageRepository;

class MessageServiceImplement extends ServiceApi implements MessageService{

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
     protected MessageRepository $mainRepository;

    public function __construct(MessageRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
    public function getAllPesan(){
      return $this->mainRepository->getAllPesan();
    }
    public function createPesan(array $data){
      return $this->mainRepository->createPesan([
        'user_id' => $data['user_id'],
        'content' => $data['content']
      ]);
    }
}
