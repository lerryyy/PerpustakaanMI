<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
     protected $fillable = [
        'nama', 'keterangan','parent_kategori_id'
    ];
}
