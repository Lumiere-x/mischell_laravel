<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class recipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('recipes')->insert([
            [
                'title' => 'Nasi Goreng',
                'ingredients' => 'Beras, Bumbu, Ayam',
                'instructions' => 'Masak beras, tumis bumbu, campurkan semua bahan.',
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Soto',
                'ingredients' => 'Daging, Bumbu, Sayuran',
                'instructions' => 'Rebus daging, tambahkan bumbu dan sayuran.',
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
