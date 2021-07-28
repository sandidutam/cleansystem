<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomor_pegawai',
        'nama_depan',
        'nama_belakang',
        'nama_lengkap',
        'tanggal_lahir',
        'jenis_kelamin',
        'email',
        'password',
        'role',
        'jabatan',
        'no_hp',
        'foto_user'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFotoUser()
        {
            if(!$this->foto_user) {
                return asset('images/default.jpg');
            }
            
            return asset('images/'.$this->foto_user);
        }
}
