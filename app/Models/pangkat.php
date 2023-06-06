<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pangkat extends Model
{
    use HasFactory;

    protected $fillable = [
        'pangkat'
    ];


    public function user(){
        return $this->hasMany(User::class);
    }

    public function kum(){
        return $this->hasMany(kum::class);
    }
}
