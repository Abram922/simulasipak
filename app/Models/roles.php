<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;
    protected $fillable =[
        'role',

    ];

    public function user(){
        return $this->hasMany(User::class);
    }

}
