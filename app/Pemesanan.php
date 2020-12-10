<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = "pemesanan";
    protected $guarded = [''];

    public function pembayaran()
    {
        return $this->hasMany('App\Pembayaran', 'id_pemesanan');
    }
}
