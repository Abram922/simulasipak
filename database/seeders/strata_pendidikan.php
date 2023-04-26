<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class strata_pendidikan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stratapendidikans')->insert([
            [
                'strata' => 'S1',
                'nilai' => 100
            ],
            [
                'strata' => 'S2 (Magister)',
                'nilai' => 150
            ],
            [
                'strata' => 'S3 (Doktor)',
                'nilai' => 200
            ],
        ]);
    }
}
