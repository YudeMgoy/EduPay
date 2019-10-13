<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_transaksi')->unique();
            $table->unsignedInteger('pembeli_id')->nullable();
            $table->integer('paymen');
            $table->string('alamat_kelas');
            $table->integer('no_wa');
            $table->double('total_harga');
            $table->timestamps();
            
            $table->foreign('pembeli_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('transaksis');
    }
}
