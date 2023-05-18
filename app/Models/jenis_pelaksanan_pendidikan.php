<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_pelaksanan_pendidikan extends Model
{
    use HasFactory;

    protected $fillable =[
        'jenispelaksanaan',
        'Lektor_Kepala',
        'angka_kredit'
    ];

    public function pelaksanaanpendidikan(){
        return $this->hasMany(pelaksanaan_pendidikan::class);
    }
}
