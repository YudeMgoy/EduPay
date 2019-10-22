<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ListBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('list_barangs', function (Blueprint $table) {
           $table->integer('satuan');
           $table->string('deskripsi')->nullable();
           $table->double('diskon')->nullable();
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('list_barangs', function($table) {
            $table->dropColumn('satuan');
            $table->dropColumn('diskon');
        });
    }
}
