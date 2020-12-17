<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = "pemesanan";
    protected $guarded = [''];

    public function bayar()
    {
        return $this->hasMany('App\Pembayaran', 'id_pemesanan');
    }

    public function user()
    {
        return $this->belongsTo('App\User' , 'id_user');
    }
}
