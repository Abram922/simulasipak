<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kum',
        'id_semester',
        'matakuliah',
        'kode_matakuliah',
        'instansi',
        'sks_pengajaran',
        'jumlah_angka_kredit',
        'volume_dosen_pengajar',
        'nama_kelas_pengajaran'
    ];

    public function xsemester(){
        return $this->belongsTo('App\Models\semester', 'id_semester', 'id');
    }

    public function kum(){
        return $this->belongsTo('App\Models\kum', 'kum_id', 'id');
    }

}
