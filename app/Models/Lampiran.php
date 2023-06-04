<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'jenislampiran',
        'file'
    ];

    public function user(){
        return $this->hasMany(User::class);
    }


}
