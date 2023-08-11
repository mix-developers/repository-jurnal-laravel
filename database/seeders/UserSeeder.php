<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'identity' => 'admin',
            'email' => 'admin@gmail.com',
            'avatar' => '',
            'phone' => '082248493036',
            'password' => hash::make('admin'),
            'role' => 'admin',
            'is_verified' => 1,
            'id_major' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'dosen',
            'identity' => 'dosen',
            'email' => 'dosen@gmail.com',
            'avatar' => '',
            'phone' => '082248493036',
            'password' => hash::make('dosen'),
            'role' => 'dosen',
            'is_verified' => 1,
            'id_major' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'mahasiswa',
            'identity' => 'mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'avatar' => '',
            'phone' => '082248493036',
            'password' => hash::make('mahasiswa'),
            'role' => 'mahasiswa',
            'is_verified' => 1,
            'is_graduate' => 0,
            'id_major' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'jurusan',
            'identity' => 'jurusan',
            'email' => 'jurusan@gmail.com',
            'avatar' => '',
            'phone' => '082248493036',
            'password' => hash::make('jurusan'),
            'role' => 'jurusan',
            'is_verified' => 1,
            'is_graduate' => 0,
            'id_major' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
