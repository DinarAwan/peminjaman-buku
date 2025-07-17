<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanBulanan extends Model
{
    protected $table = 'laporan_bulanan';

    protected $fillable = [
        'id',
        'tahun',
        'bulan',
        'jumlah_peminjaman',
        'jumlah_buku_belum_kembali',
        'deskripsi'
    ];
}
