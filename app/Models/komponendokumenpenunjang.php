<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komponendokumenpenunjang extends Model
{
    use HasFactory;

    protected $fillable =[
        'komponenkegiatan' ,
        'angkakreditmax',
        'bukti_kegiatan',
        'batas_maksimal_diakui'
    ];

    public function dokumenpenunjang(){
        return $this->hasMany(dokumenpenunjang::class);
    }
}
