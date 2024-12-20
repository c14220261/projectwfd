<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->insert([



            [
                'car_model' => 'Chevrolet Malibu',
                'year' => 2022,
                'status' => 'available',
                'number_plate' => 'MN012OP',
                'no_rangka' => 'JKL1234567890',
                'price' => 550.00,
                'current_profile_id' => null,
                'img'=> 'https://static.promediateknologi.id/crop/0x0:0x0/x/photo/p2/93/2024/08/29/2019-Chevy-Trax-1LZ-Model-Left-971958030.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
