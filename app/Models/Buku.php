<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
