<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stratapendidikan extends Model
{
    use HasFactory;
    protected $fillable = [
        'strata',
        'nilai',
        'keterangan',
        'batas_maksimal_diakui'
    ];

    
    public function pendidikan(){
        return $this->hasMany(pendidikan::class);
    }

    

}
