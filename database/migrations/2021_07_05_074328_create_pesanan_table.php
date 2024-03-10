<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pelanggan_id');
            $table->integer('admin_id');
            $table->integer('provinsi_id')->nullable();
            $table->integer('kota_id')->nullable();
            $table->integer('kurir_id')->nullable();
            $table->string('kode_pesanan');
            $table->date('tgl_pesanan');
            $table->integer('status_pesanan');
            $table->integer('total_harga')->nullable();
            $table->text('alamat_kirim')->nullable();
            $table->string('nomor_resi')->nullable();
            $table->integer('biaya_ongkir')->nullable();
            $table->string('kurir')->nullable();
            $table->string('paket_kurir')->nullable();
            $table->string('estimasi')->nullable();
            $table->integer('berat')->nullable();
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
        Schema::dropIfExists('pesanan');
    }
}
