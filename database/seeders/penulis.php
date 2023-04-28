<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class penulis extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penulis')->insert([
            [
                'jenispenulis' => 'First Author',
                'persentase_skor' => 60
            ],
            [
                'jenispenulis' => 'Author',
                'persentase_skor' => 40
            ],
        ]);
    }
}
