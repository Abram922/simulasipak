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
                'strata' => 'Mengikuti pendidikan formal dan memperoleh gelar/ sebutan/ ijazah',
                'nilai' => 100,
                'keterangan' => 'Strata 1'  ,
                'batas_maksimal_diakui' => '1/ periode penilaian'

            ],
            [
                'strata' => 'Mengikuti pendidikan formal dan memperoleh gelar/ sebutan/ ijazah',
                'nilai' => 150,
                'keterangan' => 'Magister/Sederajat'  ,
                'batas_maksimal_diakui' => '1/ periode penilaian'
            ],
            [
                'strata' => 'Mengikuti pendidikan formal dan memperoleh gelar/ sebutan/ ijazah',
                'nilai' => 200,
                'keterangan' => 'Doktor/Sederajat'  ,
                'batas_maksimal_diakui' => '1/ periode penilaian'
            ],
        ]);
    }
}
