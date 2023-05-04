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
                'jenispenulis' => 'First Author dan Corresponding Author',
                'persentase_skor' => 60,
                'note' => '',
                'penulis_khusus' => true
            ],
            [
                'jenispenulis' => 'First Author',
                'persentase_skor' => 40,
                'note' => '',
                'penulis_khusus' => true
            ],
            [
                'jenispenulis' => 'Corresponding Author',
                'persentase_skor' => 40,
                'note' => '',
                'penulis_khusus' => true
            ],
            [
                'jenispenulis' => 'Author A',
                'persentase_skor' => 40,
                'note' => '',
                'penulis_khusus' => false
            ],            [
                'jenispenulis' => 'Author B',
                'persentase_skor' => 20,
                'note' => '',
                'penulis_khusus' => false
            ],
        ]);
    }
}
