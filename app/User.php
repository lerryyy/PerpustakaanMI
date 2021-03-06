<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email','access_token','admin_perpustakaan','dosen','staff','mahasiswa'// 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'access_token'//'remember_token',//'password',
    ];

    public function adminPerpustakaan(){
        if($this->admin_perpustakaan===1)
            return true;
        else
            return false;
    }
}
