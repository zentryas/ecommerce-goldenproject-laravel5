<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $guarded = [];

    public function pelanggan()
	{
	      return $this->belongsTo('App\User','pelanggan_id', 'id');
	}

	public function pesanan_detail() 
	{
	     return $this->hasMany('App\PesananDetail','pesanan_id', 'id');
	}

	public function admin()
	{
	      return $this->belongsTo('App\Admin','admin_id', 'id');
	}

	public function pembayaran() 
	{
	     return $this->hasMany('App\Pembayaran','pesanan_id', 'id');
	}
}
