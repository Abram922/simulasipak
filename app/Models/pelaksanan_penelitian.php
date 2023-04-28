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
    public function kum(){
        return $this->belongsTo('App\Models\kum', 'kum_id', 'id');
    }

    public function akreditasi(){
        return $this->belongsTo('App\Models\akreditasi_penelitian', 'akreditasi_id', 'id');
    }

    public function penulis(){
        return $this->belongsTo('App\Models\penulis', 'jenispenulis_id', 'id');
    }


}
