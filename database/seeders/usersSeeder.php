<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Lumiere',
                'email' => 'lumiere@gmail.com',
                'email_verified_at' => null,
                'password' => bcrypt('123'),
                'remember_token' => null,
                'role' => 'admin', // Menambahkan role admin
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => null,
                'role' => 'user', // Role untuk user biasa
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
