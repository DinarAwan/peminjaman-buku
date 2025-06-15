<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'anggota',
                'email' => 'anggota@gmail.com',
                'password' => bcrypt('anggota123'),
                'role' => 'anggota',
            ],
            [
                'name' => 'dinar',
                'email' => 'dinar@gmail.com',
                'password' => bcrypt('dinar123'),
                'role' => 'anggota',
            ]
            
        ]);
    }
}
