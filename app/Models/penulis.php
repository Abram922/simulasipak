<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penulis extends Model
{
    use HasFactory;

    protected $fillable=[
        'jenispenulis',
        'persentase_skor',
        'note',
        'penulis_khusus'

    ];

    public function pelaksanaanpenelitian(){
        return $this->hasMany(pelaksanan_penelitian::class);
    }
}
