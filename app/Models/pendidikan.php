<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendidikan extends Model
{
    use HasFactory;

    protected $fillable = [
        'institusi',
        'tanggal',
        'strata_id',
        'kum_id',
        'bukti'
    ];

    
    public function strata(){
        return $this->belongsTo('App\Models\stratapendidikan', 'strata_id', 'id');
    }
    public function kum(){
        return $this->belongsTo('App\Models\kum', 'kum_id', 'id');
    }
}
