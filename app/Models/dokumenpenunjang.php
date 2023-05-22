<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokumenpenunjang extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'komponenpenunjang_id' ,
        'kum_id',
        'namakegiatan_dp' ,
        'tanggal_pelaksanaan_dp',
        'instansi_dp',
        'angkakredit_dp',
        'kedudukan_dp',
        'buktidp'
    ];

    public function komponendp(){
        return $this->belongsTo('App\Models\komponendokumenpenunjang', 'komponenpenunjang_id', 'id');
    }


}
