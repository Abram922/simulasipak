<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class komponenpenelitian extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("komponen_penelitians")->insert([
            [
                "komponenkegiatan" => "Hasil penelitian atau pemikiran atau kerjasama industri yang tidak dipublikasikan (tersimpan dalam perpustakaan) yang dilakukan secara melembaga",
                "angkakredit" => 2,
                "bukti_kegiatan" => "Pindai halaman sampul,daftar isi,lemar pengesahan dan bukti kinerja",
                "batas_maksimal_diakui" => "Jumlah angka kredit karyai ilmiah paling banyak 5% dari angka kredit unsur penelitian untuk pengajuan ke semua jenjang",

            ],
            [
                "komponenkegiatan" => "Menerjemahkan/menyadur buku ilmiah yang diterbitkan (ber ISBN)",
                "angkakredit" => 15,
                "bukti_kegiatan" => "Pindai bukti kinerja dan sertifikat paten",
                "batas_maksimal_diakui" => "",

            ],
            [
                "komponenkegiatan" => "Mengedit/menyunting karya ilmiah dalam bentuk buku yang diterbitkan (ber ISBN)",
                "angkakredit" => 10,
                "bukti_kegiatan" => "Pindai bukti kinerja dan sertifikat paten",
                "batas_maksimal_diakui" => "",

            ],
            [
                "komponenkegiatan" => "Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI secara Internasional yang sudah diimplementasikan di industri (paling sedikit diakui 4 Negara)",
                "angkakredit" => 60,
                "bukti_kegiatan" => "Pindai bukti kinerja dan sertifikat paten",
                "batas_maksimal_diakui" => "",

            ],
            [
                "komponenkegiatan" => "Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI secara Internasional (paling sedikit diakui 4 Negara)",
                "angkakredit" => 50,
                "bukti_kegiatan" => "Pindai bukti kinerja dan sertifikat paten",
                "batas_maksimal_diakui" => "",

            ],
            [
                "komponenkegiatan" => "Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI secara Nasinal yang sudah diimplementasikan di industri",
                "angkakredit" => 40,
                "bukti_kegiatan" => "Pindai bukti kinerja dan sertifikat paten",
                "batas_maksimal_diakui" => "",

            ],
            [
                "komponenkegiatan" => "Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI secara Nasional ",
                "angkakredit" => 30,
                "bukti_kegiatan" => "Pindai bukti kinerja dan sertifikat paten",
                "batas_maksimal_diakui" => "",

            ],
            [
                "komponenkegiatan" => "Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI secara Nasional, dalam bentuk paten sederhana yang telah memiliki sertifikat dari Direktorat Jenderal Kekayaan Intelektual, Kemenkumham",
                "angkakredit" => 20,
                "bukti_kegiatan" => "Pindai bukti kinerja dan sertifikat paten",
                "batas_maksimal_diakui" => "",

            ],
            [
                "komponenkegiatan" => "Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI secara Nasional : Karya ciptaan, desain industri,indikasi geografis yang telah memiliki sertifikat dari Direktorat Jendetal Kekayaan Intelektual,Kemenkumham",
                "angkakredit" => 15,
                "bukti_kegiatan" => "Pindai bukti kinerja dan sertifikat dari Direktorat Jenderal Kekayaan Intelektual, Kemenkumham",
                "batas_maksimal_diakui" => "1 karya/ semester",

            ],
            [
                "komponenkegiatan" => "Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI secara Nasional : Karya cipta berupa bahan pengajaran (buku ajar,modul, dan lainnya) yang telah mendapatkan sertifikat karya cipta dari Direktorat Jenderal Kekayaan Intelektual,Kemenkumham maka karya cipta tersebut tidak dapat diajukan sebagai bukti kegiatan melaksanakan penelitian",
                "angkakredit" => 15,
                "bukti_kegiatan" => "Pindai bukti kinerja dan sertifikat dari Direktorat Jenderal Kekayaan Intelektual, Kemenkumham",
                "batas_maksimal_diakui" => "1 karya/ semester",

            ],

 
        ]);
    }
}
