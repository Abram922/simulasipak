<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kum extends Model
{
    use HasFactory;

    protected $fillable=[
        'judul',
        'id_user',
        'id_jabatan_sekarang',
        'id_jabatan_dituju'

    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }

    public function jabatanpref(){
        return $this->belongsTo('App\Models\jabatan', 'id_jabatan_sekarang', 'id');
    }
    
    public function jabatannext(){
        return $this->belongsTo('App\Models\jabatan', 'id_jabatan_dituju', 'id');
    }

    public function pelaksanaanpenelitian(){
        return $this->hasMany(pelaksanan_penelitian::class);
    }

    public function pelaksanaanpm(){
        return $this->hasMany(pelaksanaan_pm::class);
    }

    public function pendidikan(){
        return $this->hasMany(pendidikan::class);
    }
    public function pelaksanaanpendidikan(){
        return $this->hasMany(pelaksanaan_pendidikan::class);
    }




}
