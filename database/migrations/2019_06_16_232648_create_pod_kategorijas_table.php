<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePodKategorijasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podkategorija', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('naziv');
            $table->unsignedInteger('kategorija_id');
            $table->string('slikaUrl');
            $table->timestamps();
            $table->foreign('kategorija_id')->references('id')->on('kategorija')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('podkategorija');
    }
}
