<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeranjangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjangs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pembeli_id');
            $table->string('nama_barang');
            $table->integer('status')->nullable();
            $table->double('harga_barang');
            $table->integer('jumlah_barang');
            $table->unsignedInteger('transaksi_id')->nullable();
            $table->timestamps();

            $table->foreign('pembeli_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('transaksi_id')
                ->references('id')->on('transaksis')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keranjangs');
    }
}
