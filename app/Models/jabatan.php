<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jabatan',
        'angkaKreditKumulatif',
        'pelaksanaanPendidikan',
        'pelaksanaanPenelitian',
        'pelaksanaanPengabdianMasyarakat',
        'penunjang'
    ];

    public function userjabatanrpref(){
        return $this->hasMany(kum::class);
    }

    public function userjabatannext(){
        return $this->hasMany(kum::class);
    }
}
