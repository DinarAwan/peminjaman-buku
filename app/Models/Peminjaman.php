<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $fillable = [
        'id',
        'user_id',
        'buku_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
        'keterangan'
    ];
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function buku()
{
    return $this->belongsTo(Buku::class, 'buku_id');
}
}
