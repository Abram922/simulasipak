<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelaksanaan_pendidikan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kum_id',
        'idjenispelaksanaan',
        'semester_id',
        'nama_kegiatan',
        'tempat_instansi',
        'sks',
        'bukti',
        'jumlah_kelas',
        'jumlah_angka_kredit',
        'volume_dosen'
    ];

    public function semester(){
        return $this->belongsTo('App\Models\semester', 'semester_id', 'id');
    }
    public function jenispelaksanaan(){
        return $this->belongsTo('App\Models\jenis_pelaksanan_pendidikan', 'idjenispelaksanaan', 'id');
    }
    public function kum(){
        return $this->belongsTo('App\Models\kum', 'kum_id', 'id');
    }



}
