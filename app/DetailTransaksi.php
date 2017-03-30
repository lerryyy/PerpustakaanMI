<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $fillable = [
        'kondisi_buku', 'buku_id','transaksi_id'
    ];
}
