<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtiklisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikli', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv');
            $table->string('opis');            
            $table->unsignedBigInteger('podkategorija_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('podkategorija_id')->references('id')->on('podkategorija')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artikli');
    }
}
