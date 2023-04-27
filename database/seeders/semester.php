<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class semester extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('semesters')->insert([
            [
                'semester' => 'Semester Genap TA 2020/2021'
            ], 
            [
                'semester' => 'Semester Ganjil TA 2021/2022'
            ],
            [
                'semester' => 'Semester Genap TA 2022/2023'
            ], 
            [
                'semester' => 'Semester Ganjil TA 2023/2024'
            ],
            [
                'semester' => 'Semester Genap TA 2024/2025'
            ],
            [
                'semester' => 'Semester Ganjil TA 2025/2026'
            ],
            [
                'semester' => 'Semester Genap TA 2026/2027'
            ],
            [
                'semester' => 'Semester Ganjil TA 2027/2028'
            ],
            [
                'semester' => 'Semester Genap TA 2028/2029'
            ],
        ]);
    }
}
