<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Spektrum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('spektrum', function (Blueprint $table) {
            $table->string('kode_spektrum')->index();
            $table->string('nama_spektrum')->index();
            $table->timestamp('created_at');
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
