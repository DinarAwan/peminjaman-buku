<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Buku extends Model
{
    protected $table = 'buku';

    protected $fillable = [
        'judul',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'isbn',
        'kategori_id',
        'jumlah',
        'deskripsi',
        'foto',
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function dipinjamOleh(){
        return $this->belongsToMany(User::class, 'peminjaman', )
                    ->withPivot('tanggal_pinjam', 'tanggal_kembali', 'status')
                    ->withTimestamps();
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function isLikeBy($user){
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function komentars(){
        return $this->hasMany(Komentar::class);
    }
}
