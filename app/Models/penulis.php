<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penulis extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'jenispenulis',
        'persentase_skor'

    ];

    public function pelaksanaanpenelitian(){
        return $this->hasMany(pelaksanan_penelitian::class);
    }
}
