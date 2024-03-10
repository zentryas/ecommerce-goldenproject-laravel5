<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $guarded = [];

    public function kategori()
    {
    	return $this->belongsTo('App\Kategori');
    }

    public function supplier()
    {
    	return $this->belongsTo('App\Supplier');
    }
}
