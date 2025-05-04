<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama'      => 'Akhmad Thariq A',
            'email'     => 'admin@gmail.com',
            'password'  => Hash::make('12345678'),
            'jabatan'   => 'Admin',
            'is_tugas'  => false,
        ]);

        User::create([
            'nama'      => 'Senju',
            'email'     => 'senju@gmail.com',
            'password'  => Hash::make('123456789'),
            'jabatan'   => 'karyawan',
            'is_tugas'  => false,
        ]);

        User::create([
            'nama'      => 'gora',
            'email'     => 'gora@gmail.com',
            'password'  => Hash::make('1234567890'),
            'jabatan'   => 'karyawan',
            'is_tugas'  => false,
        ]);

        User::create([
            'nama'      => 'wahuy',
            'email'     => 'wahuy@gmail.com',
            'password'  => Hash::make('1234567890'),
            'jabatan'   => 'karyawan',
            'is_tugas'  => false,
        ]);

    }
}
