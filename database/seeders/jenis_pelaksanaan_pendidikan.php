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
                        'jenispelaksanaan' => ' Melaksanakan perkuliahan Tutorial dan membimbing, Menguji serta menyelenggarakan pendidikan di laboratorium, praktek perguruan bengkel/studio, kebun percobaan, teknologi pengajaran dan praktek lapangan',
                        'withsks' => false
                    ],
                
                    [
                        'jenispelaksanaan' => 'Membimbing seminar mahasiswa',
                        'withsks' => true
                    ],
                
                    [
                        'jenispelaksanaan' => 'Membimbing Kuliah Kerja Nyata (KKN),Praktek Kerja Nyata (PKN),Praktek Kerja  Lapangan (PKL)',
                        'withsks' => true
                    ],
                
                    [
                        'jenispelaksanaan' => 'Membimbing dan ikut Membimbing dalam menghasilkan laporan akhir tugas/skripsi/thesis/disertasi',
                        'withsks' => true
                    ],
                
                    [
                        'jenispelaksanaan' => 'Bertugas sebagai penguji pada Ujian Akhir',
                        'withsks' => true
                    ],
                
                    [
                        'jenispelaksanaan' => 'Bertugas sebagai penguji pada Ujian Akhir',
                        'withsks' => true
                    ],
                
                    [
                        'jenispelaksanaan' => 'Membina kegiatan mahasiswa di Bidang akademi dan kemahasiswaan',
                        'withsks' => true
                    ],
                
                    [
                        'jenispelaksanaan' => 'Mengembangkan program perkuliahan',
                        'withsks' => true
                    ],
                
                    [
                        'jenispelaksanaan' => 'Mengembangkan bahan pengajaran',
                        'withsks' => true
                    ],
                
                    [
                        'jenispelaksanaan' => 'Menyampaikan Orasi Ilmiah',
                        'withsks' => true
                    ],
                
                    [
                        'jenispelaksanaan' => 'Menduduki jabatan pimpinan Perguruan Tinggi',
                        'withsks' => true
                    ],
                
                    [
                        'jenispelaksanaan' => 'Membimbing Dosen yang lebih Rendah jabatan fungsionalnya',
                        'withsks' => true
                    ],
                
                    [
                        'jenispelaksanaan' => 'Melaksanakan kegiatan datasering Dan pencangkokan Dosen',
                        'withsks' => true
                    ],
                
                    [
                        'jenispelaksanaan' => 'Melaksanakan pengembangan diri untuk meningkatkan kompetensi',
                        'withsks' => true
                    ],
        ]);



        
    }
}
