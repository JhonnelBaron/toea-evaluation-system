<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ExecutiveOfficeAccountsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('executive_office_accounts')->insert([
            [
                'executive_office' => 'AS',
                'name' => 'John Doe',
                'position' => 'Manager',
                'office' => 'Office 1',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'executive_office' => 'LD',
                'name' => 'Jane Smith',
                'position' => 'Director',
                'office' => 'Office 2',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'executive_office' => 'ROMD',
                'name' => 'admin',
                'position' => 'Director',
                'office' => 'Office 2',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'executive_office' => 'RO',
                'name' => 'Region I',
                'position' => 'Director',
                'office' => 'Office 2',
                'email' => 'region1@example.com',
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'executive_office' => 'RO',
                'name' => 'Region II',
                'position' => 'Director',
                'office' => 'Office 2',
                'email' => 'region2@example.com',
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'executive_office' => 'RO',
                'name' => 'NCR',
                'position' => 'Director',
                'office' => 'Office 2',
                'email' => 'ncr@example.com',
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more entries as needed
        ]);
    }
}
