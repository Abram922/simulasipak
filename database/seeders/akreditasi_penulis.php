<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class akreditasi_penulis extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('akreditasi_penelitians')->insert([
            [
                'akreditasi' => 'Sinta 1' ,
                'nilai' => 25
            ],
            [
                'akreditasi' => 'Sinta 2' ,
                'nilai' => 25
            ],
            [
                'akreditasi' => 'Sinta 3' ,
                'nilai' => 20
            ],
            [
                'akreditasi' => 'Sinta 4' ,
                'nilai' => 20
            ],
            [
                'akreditasi' => 'Sinta 5' ,
                'nilai' => 15
            ],
            [
                'akreditasi' => 'Sinta 6' ,
                'nilai' => 15
            ],
        ]);
    }
}
