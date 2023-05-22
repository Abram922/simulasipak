<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komponenpm extends Model
{
    use HasFactory;


    protected $fillable =[
        'komponenkegiatan',
        'angkakredit',
        'bukti_kegiatan',
        'batas_maksimal_diakui'

    ];

}
