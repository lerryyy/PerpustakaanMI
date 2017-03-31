<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarUlang extends Model
{
    protected $fillable = [
        'users_id', 'expired','biaya'
    ];
}
