<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $guarded = [];

    public function produk()
    {
    	return $this->belongsToMany('App\Produk');
    }
}
