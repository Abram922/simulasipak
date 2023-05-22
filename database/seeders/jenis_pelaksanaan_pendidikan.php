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
                        'angka_kredit' => "2",
                        'bukti_kegiatan' => 'Pindai SK penugasan
                        asli dan bukti kinerja',
                        'batas_maksimal_diakui' => '1/ periode penilaian'
                        
                    ],
                
                    [
                        'jenispelaksanaan' => 'Membimbing Kuliah Kerja Nyata (KKN),Praktek Kerja Nyata (PKN),Praktek Kerja  Lapangan (PKL)',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2",
                        'bukti_kegiatan' => 'Pindai SK penugasan
                        asli dan bukti kinerja',
                        'batas_maksimal_diakui' => '1/ periode penilaian'
                    ],
                
                    [
                        'jenispelaksanaan' => 'Membimbing dan ikut Membimbing dalam menghasilkan laporan akhir tugas/skripsi/thesis/disertasi',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2",
                        'bukti_kegiatan' => 'Pindai SK penugasan
                        asli dan bukti kinerja',
                        'batas_maksimal_diakui' => '1/ periode penilaian'
                    ],
                
                    [
                        'jenispelaksanaan' => 'Bertugas sebagai penguji pada Ujian Akhir',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2",
                        'bukti_kegiatan' => 'Pindai SK penugasan
                        asli dan bukti kinerja',
                        'batas_maksimal_diakui' => '1/ periode penilaian'
                    ],
                
                    [
                        'jenispelaksanaan' => 'Bertugas sebagai penguji pada Ujian Akhir',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2",
                        'bukti_kegiatan' => 'Pindai SK penugasan
                        asli dan bukti kinerja',
                        'batas_maksimal_diakui' => '1/ periode penilaian'
                    ],
                
                    [
                        'jenispelaksanaan' => 'Membina kegiatan mahasiswa di Bidang akademi dan kemahasiswaan',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2",
                        'bukti_kegiatan' => 'Pindai SK penugasan
                        asli dan bukti kinerja',
                        'batas_maksimal_diakui' => '1/ periode penilaian'
                    ],
                
                    [
                        'jenispelaksanaan' => 'Mengembangkan program perkuliahan',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2",
                        'bukti_kegiatan' => 'Pindai SK penugasan
                        asli dan bukti kinerja',
                        'batas_maksimal_diakui' => '1/ periode penilaian'
                    ],
                
                    [
                        'jenispelaksanaan' => 'Mengembangkan bahan pengajaran',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2",
                        'bukti_kegiatan' => 'Pindai SK penugasan
                        asli dan bukti kinerja',
                        'batas_maksimal_diakui' => '1/ periode penilaian'
                    ],
                
                    [
                        'jenispelaksanaan' => 'Menyampaikan Orasi Ilmiah',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2",
                         'bukti_kegiatan' => 'Pindai SK penugasan
                        asli dan bukti kinerja',
                        'batas_maksimal_diakui' => '1/ periode penilaian'
                    ],
                
                    [
                        'jenispelaksanaan' => 'Menduduki jabatan pimpinan Perguruan Tinggi',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2",
                        'bukti_kegiatan' => 'Pindai SK penugasan
                        asli dan bukti kinerja',
                        'batas_maksimal_diakui' => '1/ periode penilaian'
                    ],
                
                    [
                        'jenispelaksanaan' => 'Membimbing Dosen yang lebih Rendah jabatan fungsionalnya',
                        'Lektor_Kepala' => true,
                        'angka_kredit' => "2",
                        'bukti_kegiatan' => 'Pindai SK penugasan
                        asli dan bukti kinerja',
                        'batas_maksimal_diakui' => '1/ periode penilaian'
                    ],

                
                    [
                        'jenispelaksanaan' => 'Melaksanakan kegiatan datasering Dan pencangkokan Dosen',
                        'Lektor_Kepala' => true,
                        'angka_kredit' => "2",
                        'bukti_kegiatan' => 'Pindai SK penugasan
                        asli dan bukti kinerja',
                        'batas_maksimal_diakui' => '1/ periode penilaian'
                    ],
                
                    [
                        'jenispelaksanaan' => 'Melaksanakan pengembangan diri untuk meningkatkan kompetensi',
                        'Lektor_Kepala' => false,
                        'angka_kredit' => "2",
                        'bukti_kegiatan' => 'Pindai SK penugasan
                        asli dan bukti kinerja',
                        'batas_maksimal_diakui' => '1/ periode penilaian'
                    ]
        ]);



        
    }
}
