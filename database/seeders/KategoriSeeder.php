<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori')->insert([
            [
                'nama_kategori' => 'Fiksi',
                'deskripsi' => 'Buku fiksi adalah buku yang berisi cerita rekaan atau imajinasi penulis.'
            ],
            [
                'nama_kategori' => 'Non-Fiksi',
                'deskripsi' => 'Buku non-fiksi adalah buku yang berisi informasi atau fakta yang nyata.'
            ],
            [
                'nama_kategori' => 'Biografi',
                'deskripsi' => 'Buku biografi adalah buku yang menceritakan kehidupan'
            ]
        ]);
    }
}
