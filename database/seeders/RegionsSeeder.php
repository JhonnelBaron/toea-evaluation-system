<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regions')->insert([
            [
                'region_name' => 'NCR',
                'region_category' => 'Large',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'CAR',
                'region_category' => 'Small',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region I',
                'region_category' => 'Medium',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region II',
                'region_category' => 'Small',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region III',
                'region_category' => 'Large',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region IV-A',
                'region_category' => 'Large',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region IV-B',
                'region_category' => 'Small',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region V',
                'region_category' => 'Medium',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region VI',
                'region_category' => 'Medium',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region VII',
                'region_category' => 'Large',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region VIII',
                'region_category' => 'Small',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region IX',
                'region_category' => 'Small',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region X',
                'region_category' => 'Medium',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region XI',
                'region_category' => 'Medium',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region XII',
                'region_category' => 'Medium',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region XIII',
                'region_category' => 'Small',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
