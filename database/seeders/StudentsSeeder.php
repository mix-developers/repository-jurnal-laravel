<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            DB::table('students')->insert([
                'identity' => '2019572010' . mt_rand(10, 99),
                'full_name' => $faker->name,
                'id_major' => 1,
                'place_birth' => 'Merauke',
                'date_birth' => date('d-m-Y'),
                'phone' => $faker->phoneNumber,
                'address' => 'Merauke',
                'status' => mt_rand(0, 1),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        for ($i = 0; $i < 50; $i++) {
            DB::table('students')->insert([
                'identity' => '2018572010' . mt_rand(10, 99),
                'full_name' => $faker->name,
                'id_major' => 1,
                'place_birth' => 'Merauke',
                'date_birth' => date('d-m-Y'),
                'phone' => $faker->phoneNumber,
                'address' => 'Merauke',
                'status' => mt_rand(0, 1),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        for ($i = 0; $i < 50; $i++) {
            DB::table('students')->insert([
                'identity' => '2017572010' . mt_rand(10, 99),
                'full_name' => $faker->name,
                'id_major' => 1,
                'place_birth' => 'Merauke',
                'date_birth' => date('d-m-Y'),
                'phone' => $faker->phoneNumber,
                'address' => 'Merauke',
                'status' => mt_rand(0, 1),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
