<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentars';

    protected $fillable = [
        'user_id',
        'buku_id',
        'isi'
    ];

    public function user(){
        return $this->belongsTo(User::class);

    }

    public function buku(){
        return $this->belongsTo(Buku::class);
    }
}
