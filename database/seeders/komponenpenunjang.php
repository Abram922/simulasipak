<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class komponenpenunjang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('komponendokumenpenunjangs')->insert([
            [
                'komponenkegiatan' => 'Menjadi anggota dalam suatu Panitia/Badan pada Perguruan Tinggi,(Sebagai Ketua/Wakil Ketua merangkap anggota, tiap tahun)',
                'angkakreditmax' => 3,
                        'bukti_kegiatan' => 'Pindai SK penugasan
                        asli dan bukti kinerja',
                        'batas_maksimal_diakui' => '1/ periode penilaian'
            ],
            [
                'komponenkegiatan' => 'Menjadi anggota dalam suatu Panitia/Badan pada Perguruan Tinggi,(Sebagai anggota, tiap tahun)',
                'angkakreditmax' => 2,
                        'bukti_kegiatan' => 'Pindai SK penugasan
                        asli dan bukti kinerja',
                        'batas_maksimal_diakui' => '1/ periode penilaian'
            ],
            [
                'komponenkegiatan' => 'Menjadi anggota panitia/badan pada lembaga pemerintah, Sebagai Ketua/Wakil Ketua Panitia Pusat',
                'angkakreditmax' => 3,
                        'bukti_kegiatan' => 'Pindai SK penugasan
                        asli dan bukti kinerja',
                        'batas_maksimal_diakui' => '1/ periode penilaian'
            ],
        ]);
    }
}
