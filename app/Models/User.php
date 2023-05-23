<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'tempat_lahir',
        'tanggal_lahir',
        'NIDN',
        'foto',
        'ikatan_kerja',
        'institusi',
        'fakultas',
        'jabatan_fungsional',
        'pangkat'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsTo('App\Models\roles', 'role', 'id');
    }

    public function jabatan_fungsional(){
        return $this->belongsTo('App\Models\jabatan', 'jabatan_fungsional', 'id');
    }
    public function pangkat(){
        return $this->belongsTo('App\Models\pangkat', 'pangkat', 'id');
    }
}
