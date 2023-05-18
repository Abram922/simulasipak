<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class jenis_pelaksanaan_pendidikan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_pelaksanan_pendidikans')->insert([
               
                    [
                        'jenispelaksanaan' => 'Membimbing seminar mahasiswa',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2"
                    ],
                
                    [
                        'jenispelaksanaan' => 'Membimbing Kuliah Kerja Nyata (KKN),Praktek Kerja Nyata (PKN),Praktek Kerja  Lapangan (PKL)',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2"
                    ],
                
                    [
                        'jenispelaksanaan' => 'Membimbing dan ikut Membimbing dalam menghasilkan laporan akhir tugas/skripsi/thesis/disertasi',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2"
                    ],
                
                    [
                        'jenispelaksanaan' => 'Bertugas sebagai penguji pada Ujian Akhir',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2"
                    ],
                
                    [
                        'jenispelaksanaan' => 'Bertugas sebagai penguji pada Ujian Akhir',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2"
                    ],
                
                    [
                        'jenispelaksanaan' => 'Membina kegiatan mahasiswa di Bidang akademi dan kemahasiswaan',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2"
                    ],
                
                    [
                        'jenispelaksanaan' => 'Mengembangkan program perkuliahan',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2"
                    ],
                
                    [
                        'jenispelaksanaan' => 'Mengembangkan bahan pengajaran',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2"
                    ],
                
                    [
                        'jenispelaksanaan' => 'Menyampaikan Orasi Ilmiah',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2"
                    ],
                
                    [
                        'jenispelaksanaan' => 'Menduduki jabatan pimpinan Perguruan Tinggi',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2"
                    ],
                
                    [
                        'jenispelaksanaan' => 'Membimbing Dosen yang lebih Rendah jabatan fungsionalnya',
                        'Lektor_Kepala' => true,
                        'angka_kredit' => "2"
                    ],

                
                    [
                        'jenispelaksanaan' => 'Melaksanakan kegiatan datasering Dan pencangkokan Dosen',
                        'Lektor_Kepala' => true,
                        'angka_kredit' => "2"
                    ],
                
                    [
                        'jenispelaksanaan' => 'Melaksanakan pengembangan diri untuk meningkatkan kompetensi',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2"
                    ]
        ]);



        
    }
}
