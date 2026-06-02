<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Kepala Dinas',
                'username' => 'pimpinan',
                'password' => Hash::make('pimpinan123'),
                'role' => 'pimpinan',
            ],
        ]);
    }
}