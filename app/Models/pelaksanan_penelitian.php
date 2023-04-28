<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelaksanan_penelitian extends Model
{
    use HasFactory;
    protected $fillable=[
        'kum_id',
        'akreditasi_id',
        'jenispenulis_id',
        'judul',
        'jurnal',
        'link',
        'jumlah_penulis',
        'angkakredit',
        'tanggal',

    ];
}
