<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akreditasi_penelitian extends Model
{
    use HasFactory;

    protected $fillable =[
        'akreditasi',
        'nilai'

    ];

    public function pelaksanaanpenelitian(){
        return $this->hasMany(pelaksanan_penelitian::class);
    }
}

