<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kategori_id');
            $table->integer('supplier_id');
            $table->string('gambar_produk');
            $table->string('nama_produk');
            $table->integer('harga_supplier');
            $table->integer('harga_jual');
            $table->integer('stok1');
            $table->integer('stok2');
            $table->integer('stok3');
            $table->integer('stok4');
            $table->integer('stok5');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
