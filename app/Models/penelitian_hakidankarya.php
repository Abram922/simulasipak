<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penelitian_hakidankarya extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kum',
        'id_semester',
        'judul',
        'jumlah_angka_kredit',
        'bukti',
        'id_jeniskarya'
    ];

    public function kum(){
        return $this->belongsTo('App\Models\kum', 'kum_id', 'id');
    }

    public function semester(){
        return $this->belongsTo('App\Models\semester', 'id_semester', 'id');
    }

    public function karya(){
        return $this->belongsTo('App\Models\KomponenPenelitian', 'id_jeniskarya', 'id');
    }
}
