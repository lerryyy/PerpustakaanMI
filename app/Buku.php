<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable = [
        'barcode', 'judul_buku','penulis','penerbit','tahun_terbit','tahun_masuk','isbn_buku','foto','kelas_rak','user_id','kategori_id'
    ];
}
