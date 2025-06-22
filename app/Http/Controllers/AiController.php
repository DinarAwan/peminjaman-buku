<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AiController extends Controller
{
    public function index(){
        return view('chatbot.index');
    }

    public function tanyaAi(Request $request){
        $pertanyaan = $request->input('pertanyaan');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('TOGETHER_API_KEY'),
            'Content-Type' => 'application/json'
        ])->post('https://api.together.xyz/v1/chat/completions', [
            'model' => 'meta-llama/Llama-3.3-70B-Instruct-Turbo-Free',
            'messages' => [
                ['role' => 'user', 'content' => $pertanyaan]
            ],
            'temperature' => 0.7
        ]);

        $jawaban = $response->json()['choices'][0]['message']['content'] ?? 'Gagal mendapatkan jawaban';

        return response()->json([
            'jawaban' => $jawaban
        ]);
    }
}
