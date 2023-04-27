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

}
