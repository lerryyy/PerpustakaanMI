<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'tanggal_pinjam', 'tanggal_kembali','tanggal_deadline','denda','keterangan','user_id'
    ];
}


