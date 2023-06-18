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
        'nama_kelas_pengajaran',
        'file',
        'status',
        'dosen1',
        'dosen2',
        'dosen3',
        'dosen_1',
        'dosen_2',
        'dosen_3',
        'inisial_dosen',
        'sk',
    ];

    public function xsemester(){
        return $this->belongsTo('App\Models\semester', 'id_semester', 'id');
    }

    public function kum(){
        return $this->belongsTo('App\Models\kum', 'kum_id', 'id');
    }

    public function userdosen1(){
        return $this->belongsTo('App\Models\User', 'dosen1', 'id');
    }
    public function userdosen2(){
        return $this->belongsTo('App\Models\User', 'dosen2', 'id');
    }
    public function userdosen3(){
        return $this->belongsTo('App\Models\User', 'dosen3', 'id');
    }

}
