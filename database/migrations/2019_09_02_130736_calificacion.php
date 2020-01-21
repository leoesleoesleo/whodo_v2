<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Calificacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('calificacion');
        Schema::create('calificacion', function(Blueprint $table){
          $table->bigIncrements('idCalificacion');
          $table->double('calificacion')->nullable;
          $table->boolean('activo');
          $table->string('ranking')->nullable;
          $table->bigInteger('idUser')->unsigned();
          $table->foreign('idUser')->references('idUser')->on('users');
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
