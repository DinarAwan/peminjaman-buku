<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori',
        'deskripsi'
    ];

    public function buku(){
        return $this->hasMany(Buku::class, 'kategori_id');
    }
}
