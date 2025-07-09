<?php

namespace App\Http\Controllers;
use App\Events\NewMessage;
use App\Services\Message\MessageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    protected $messageService;

    public function __construct(MessageService $messageService){
        $this->messageService = $messageService;
    }
    public function index(){
        $pesan = $this->messageService->getAllPesan();
        return view('forum.index', ['pesan' => $pesan]);
    }

    public function kirimPesan(Request $request){
        $user = Auth::user();
        $data = $request->validate([
            'content' => 'required',    
        ], [
            'content.required' => '',
        ]);
        $data['user_id'] = $user ? $user->id : 'Pengunjung';
        $pesan = $this->messageService->createPesan($data);
        if ($pesan) {
        broadcast(new NewMessage($pesan))->toOthers();
        return redirect()->back(); 
        }   
    }
}
