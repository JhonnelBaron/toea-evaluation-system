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
                'email' => 'as@tesda.gov.ph',
                'password' => Hash::make('toea2024'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'executive_office' => 'LD',
                'name' => 'Jane Smith',
                'position' => 'Director',
                'office' => 'Office 2',
                'email' => 'legal@tesda.gov.ph',
                'password' => Hash::make('toea2024'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'executive_office' => 'CO',
                'name' => 'Jane Smith',
                'position' => 'Director',
                'office' => 'Office 2',
                'email' => 'co@tesda.gov.ph',
                'password' => Hash::make('toea2024'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'executive_office' => 'FMS',
                'name' => 'lara',
                'position' => 'Director',
                'office' => 'Office 2',
                'email' => 'fms@tesda.gov.ph',
                'password' => Hash::make('toea2024'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'executive_office' => 'NITESD',
                'name' => 'jane',
                'position' => 'Director',
                'office' => 'Office 2',
                'email' => 'nitesd@tesda.gov.ph',
                'password' => Hash::make('toea2024'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'executive_office' => 'PIAD',
                'name' => 'jane',
                'position' => 'Director',
                'office' => 'Office 2',
                'email' => 'piad@tesda.gov.ph',
                'password' => Hash::make('toea2024'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'executive_office' => 'PO',
                'name' => 'jane',
                'position' => 'Director',
                'office' => 'Office 2',
                'email' => 'po@tesda.gov.ph',
                'password' => Hash::make('toea2024'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'executive_office' => 'PLO',
                'name' => 'jane',
                'position' => 'Director',
                'office' => 'Office 2',
                'email' => 'plo@tesda.gov.ph',
                'password' => Hash::make('toea2024'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'executive_office' => 'ROMO',
                'name' => 'jane',
                'position' => 'Director',
                'office' => 'Office 2',
                'email' => 'romo@tesda.gov.ph',
                'password' => Hash::make('toea2024'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'executive_office' => 'ICTO',
                'name' => 'jane',
                'position' => 'Director',
                'office' => 'Office 2',
                'email' => 'icto@tesda.gov.ph',
                'password' => Hash::make('toea2024'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'executive_office' => 'WS',
                'name' => 'jane',
                'position' => 'Director',
                'office' => 'Office 2',
                'email' => 'ws@tesda.gov.ph',
                'password' => Hash::make('toea2024'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'executive_office' => 'ROMD',
                'name' => 'admin',
                'position' => 'Director',
                'office' => 'Office 2',
                'email' => 'romd@tesda.gov.ph',
                'password' => Hash::make('toea2024'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'executive_office' => 'RO',
            //     'name' => 'NCR',
            //     'position' => 'Director',
            //     'office' => 'Office 2',
            //     'email' => 'ncr@tesda.gov.ph',
            //     'password' => Hash::make('toea2024'),
            //     'remember_token' => Str::random(10),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'executive_office' => 'RO',
            //     'name' => 'CAR',
            //     'position' => 'Director',
            //     'office' => 'Office 2',
            //     'email' => 'car@tesda.gov.ph',
            //     'password' => Hash::make('password123'),
            //     'remember_token' => Str::random(10),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'executive_office' => 'RO',
            //     'name' => 'Region I',
            //     'position' => 'Director',
            //     'office' => 'Office 2',
            //     'email' => 'region1@tesda.gov.ph',
            //     'password' => Hash::make('password123'),
            //     'remember_token' => Str::random(10),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'executive_office' => 'RO',
            //     'name' => 'Region II',
            //     'position' => 'Director',
            //     'office' => 'Office 2',
            //     'email' => 'region2@tesda.gov.ph',
            //     'password' => Hash::make('password123'),
            //     'remember_token' => Str::random(10),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'executive_office' => 'RO',
            //     'name' => 'Region III',
            //     'position' => 'Director',
            //     'office' => 'Office 2',
            //     'email' => 'region3@tesda.gov.ph',
            //     'password' => Hash::make('password123'),
            //     'remember_token' => Str::random(10),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'executive_office' => 'RO',
            //     'name' => 'Region IV-A',
            //     'position' => 'Director',
            //     'office' => 'Office 2',
            //     'email' => 'region4a@tesda.gov.ph',
            //     'password' => Hash::make('password123'),
            //     'remember_token' => Str::random(10),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'executive_office' => 'RO',
            //     'name' => 'Region IV-B',
            //     'position' => 'Director',
            //     'office' => 'Office 2',
            //     'email' => 'region4b@tesda.gov.ph',
            //     'password' => Hash::make('password123'),
            //     'remember_token' => Str::random(10),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'executive_office' => 'RO',
            //     'name' => 'Region V',
            //     'position' => 'Director',
            //     'office' => 'Office 2',
            //     'email' => 'region5@tesda.gov.ph',
            //     'password' => Hash::make('password123'),
            //     'remember_token' => Str::random(10),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'executive_office' => 'RO',
            //     'name' => 'Region VI',
            //     'position' => 'Director',
            //     'office' => 'Office 2',
            //     'email' => 'region6@tesda.gov.ph',
            //     'password' => Hash::make('password123'),
            //     'remember_token' => Str::random(10),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'executive_office' => 'RO',
            //     'name' => 'Region VII',
            //     'position' => 'Director',
            //     'office' => 'Office 2',
            //     'email' => 'region7@tesda.gov.ph',
            //     'password' => Hash::make('password123'),
            //     'remember_token' => Str::random(10),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'executive_office' => 'RO',
            //     'name' => 'Region VIII',
            //     'position' => 'Director',
            //     'office' => 'Office 2',
            //     'email' => 'region8@tesda.gov.ph',
            //     'password' => Hash::make('password123'),
            //     'remember_token' => Str::random(10),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'executive_office' => 'RO',
            //     'name' => 'Region IX',
            //     'position' => 'Director',
            //     'office' => 'Office 2',
            //     'email' => 'region9@tesda.gov.ph',
            //     'password' => Hash::make('password123'),
            //     'remember_token' => Str::random(10),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'executive_office' => 'RO',
            //     'name' => 'Region X',
            //     'position' => 'Director',
            //     'office' => 'Office 2',
            //     'email' => 'region10@tesda.gov.ph',
            //     'password' => Hash::make('password123'),
            //     'remember_token' => Str::random(10),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'executive_office' => 'RO',
            //     'name' => 'Region XI',
            //     'position' => 'Director',
            //     'office' => 'Office 2',
            //     'email' => 'region11@tesda.gov.ph',
            //     'password' => Hash::make('password123'),
            //     'remember_token' => Str::random(10),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'executive_office' => 'RO',
            //     'name' => 'Region XII',
            //     'position' => 'Director',
            //     'office' => 'Office 2',
            //     'email' => 'region12@tesda.gov.ph',
            //     'password' => Hash::make('password123'),
            //     'remember_token' => Str::random(10),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'executive_office' => 'RO',
            //     'name' => 'Region XIII',
            //     'position' => 'Director',
            //     'office' => 'Office 2',
            //     'email' => 'region13@tesda.gov.ph',
            //     'password' => Hash::make('password123'),
            //     'remember_token' => Str::random(10),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],

       
        ]);
    }
}
