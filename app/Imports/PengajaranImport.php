<?php

namespace App\Imports;

use App\Models\pengajaran;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
class PengajaranImport implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $id_semester;
    protected $id_kum;

    public function __construct($id_semester,$id_kum)
    {
        $this->id_semester = $id_semester;
        $this->id_kum = $id_kum;
    }


    public function model(array $row)
    {
        
        return new pengajaran([
            
            'kode_matakuliah'  => $row[2],            
            'matakuliah' => $row[3],
            'sks_pengajaran' => $row[4],
            'nama_kelas_pengajaran' => $row[5],
            'dosen_1' => $row[1],
            'dosen_2' => $row[12],
            'dosen_3' => $row[13],
            'volume_dosen_pengajar' => $row[14],
            'id_semester' => $this->id_semester,
            'id_kum' => $this->id_kum
        ]);
    }

    public function startRow(): int
    {
        return 2; // Menentukan baris pertama setelah heading untuk dimulai
    }
}
