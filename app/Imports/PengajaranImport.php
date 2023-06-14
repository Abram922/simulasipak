<?php

namespace App\Imports;

use App\Models\pengajaran;
use Maatwebsite\Excel\Concerns\ToModel;

class PengajaranImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new pengajaran([
            'matakuliah' => $row[3],
            'kode_matakuliah'  => $row[2],
            'sks_pengajaran' => $row[4],
            'nama_kelas_pengajaran' => $row[5],
            'dosen_1' => $row[1],
            'dosen_2' => $row[12],
            'dosen_3' => $row[13],
        ]);
    }
}
