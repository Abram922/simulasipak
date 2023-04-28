<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class komponenpm extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('komponenpms')->insert([
            [
                'komponenkegiatan' => 'Menduduki jabatan pimpinan pada lembaga pemerintahan/pejabat negara yang hanrs dibebaskan dari jabatan organiknya tiap semester',
                'angkakredit' => 5
            ],
            [
                'komponenkegiatan' => 'Melaksanakan pengembangan hasil pendidikan, dan penelitian yang dapat dimanfaatkan oleh masyarakat/industri setiap program',
                'angkakredit' => 3
            ],
            [
                'komponenkegiatan' => 'Memberi latihan/penyuluhan/penataran/ceramah pada masyarakat terjadwal/terprogram Tingkat Internasional(Dalam satu semester atau lebih)',
                'angkakredit' => 4
            ],
            [
                'komponenkegiatan' => 'Memberi latihan/penyuluhan/penataran/ceramah pada masyarakat terjadwal/terprogram Tingkat Nasional(Dalam satu semester atau lebih)',
                'angkakredit' => 3
            ],
            [
                'komponenkegiatan' => 'Memberi latihan/penyuluhan/penataran/ceramah pada masyarakat terjadwal/terprogram Tingkat Lokal(Dalam satu semester atau lebih)',
                'angkakredit' => 2
            ],
            [
                'komponenkegiatan' => 'Memberi latihan/penyuluhan/penataran/ceramah pada masyarakat terjadwal/terprogram Tingkat Internasional(Kurang dari satu semester dan minimal satu bulan)',
                'angkakredit' => 3
            ],
            [
                'komponenkegiatan' => 'Memberi latihan/penyuluhan/penataran/ceramah pada masyarakat terjadwal/terprogram Tingkat Nasional(Kurang dari satu semester dan minimal satu bulan)',
                'angkakredit' => 2
            ],
            [
                'komponenkegiatan' => 'Memberi latihan/penyuluhan/penataran/ceramah pada masyarakat terjadwal/terprogram Tingkat Lokal(Kurang dari satu semester dan minimal satu bulan)',
                'angkakredit' => 1
            ],
            [
                'komponenkegiatan' => 'Memberi latihan/penyuluhan/penataran/ceramah pada masyarakat terjadwal/terprogram Tingkat Insidental(Kurang dari satu semester dan minimal satu bulan)',
                'angkakredit' => 1
            ],
            [
                'komponenkegiatan' => 'Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas pemerintahan dan pembangunan(Berdasarkan bidang keahlian, tiap program)',
                'angkakredit' => 2
            ],
            [
                'komponenkegiatan' => 'Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas pemerintahan dan pembangunan(Berdasarkan penugasan lembaga perguruan tinggi, tiap program)',
                'angkakredit' => 1
            ],
            [
                'komponenkegiatan' => 'Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas pemerintahan dan pembangunan(Berdasarkan fungsi/jabatan tiap program)',
                'angkakredit' => 1
            ],
            [
                'komponenkegiatan' => 'Membuat/menulis karya pengabdian pada masyarakat yang tidak dipublikasikan, tiap karya',
                'angkakredit' => 3
            ],
            [
                'komponenkegiatan' => 'Hasil kegiatan pengabdian kepada masyarakat yang dipublikasikan di sebuah berkala/jurnal pengabdian kepada masyarakat atau teknologi tepat guna, merupakan diseminasi dari luaran program kegiatan pengabdian kepada masyarakat, tiap karya',
                'angkakredit' => 5
            ],
            [
                'komponenkegiatan' => 'Berperan serta aktif dalam pengelolaan jurnal ilmiah, Editor/dewan penyunting/dewan redaksi jurnal ilmiah internasional',
                'angkakredit' => 1
            ],
        ]);
    }
}
