<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = "pembayaran";
    protected $guarded = [''];

    public function pemesanan()
    {
        return $this->belongsTo('App\Pemesanan' , 'id_pemesanan');
    }
}
