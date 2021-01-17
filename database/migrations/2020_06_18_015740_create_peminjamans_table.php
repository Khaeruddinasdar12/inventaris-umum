<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeminjamansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('barang_id')->unsigned();
            $table->string('peminjam');
            $table->integer('jumlah');
            $table->string('kondisi');
            $table->datetime('tanggal_kembali')->nullable();
            $table->integer('created_by')->unsigned();
            $table->string('accepted_by')->nullable();
            $table->string('foto_awal')->nullable();
            $table->string('foto_kembali')->nullable();
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('barang_id')->references('id')->on('databarangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamans');
    }
}
