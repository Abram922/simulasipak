<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class semester extends Model
{
    use HasFactory;
    protected $fillable =[
        'semester'
    ];

    public function pelaksanaanpendidikan(){
        return $this->hasMany(pelaksanaan_pendidikan::class);
    }

    public function pelaksanaanpm(){
        return $this->hasMany(pelaksanaan_pm::class);
    }

    public function penelitian_hakidankarya(){
        return $this->hasMany(penelitian_hakidankarya::class);
    }





}
