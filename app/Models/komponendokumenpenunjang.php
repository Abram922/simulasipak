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

    ];

    public function dokumenpenunjang(){
        return $this->hasMany(dokumenpenunjang::class);
    }
}
