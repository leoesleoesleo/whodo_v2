<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Portafolios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('portafolios');
        Schema::create('portafolios', function(Blueprint $table){
          $table->bigIncrements('idPortafolio');
          $table->string('portafolio');
          $table->boolean('activo');
          $table->bigInteger('idUser')->unsigned();
          $table->bigInteger('idCategoria')->unsigned();
          $table->foreign('idUser')->references('idUser')->on('users');
          $table->foreign('idCategoria')->references('idCategoria')->on('categorias');
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
        //
    }
}
