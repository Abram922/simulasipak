<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelaksanaan_pm extends Model
{
    use HasFactory;

    protected $fillable=[
        'kum_id',
        'komponenpm_id',
        'semester_id',
        'nama',
        'bentuk',
        'tempat_instansi',
        'angkakreditpm',
        'buktifisik',
    ];

    public function semester(){
        return $this->belongsTo('App\Models\semester', 'semester_id', 'id');
    }

    public function kum(){
        return $this->belongsTo('App\Models\kum', 'kum_id', 'id');
    }

    public function komponen(){
        return $this->belongsTo('App\Models\komponen_pm', 'komponenpm_id', 'id');
    }

}
