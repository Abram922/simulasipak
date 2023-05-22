<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomponenPenelitian extends Model
{
    use HasFactory;
    protected $fillable =[
        'komponenkegiatan',
        'angkakredit',
        'bukti_kegiatan',
        'batas_maksimal_diakui',
        'jurnal'
    ];

    public function penelitian_hakidankarya(){
        return $this->hasMany(penelitian_hakidankarya::class);
    }

}
