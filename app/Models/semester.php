<?php

namespace App\Models;

use App\Models\pelaksanaan_pm;
use App\Models\penelitian_hakidankarya;
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
