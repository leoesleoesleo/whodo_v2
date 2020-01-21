<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Solicitud extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('solicitud');
        Schema::create('solicitud', function(Blueprint $table){
          $table->bigIncrements('idSolicitud');
          $table->integer('cantidadProductos');
          $table->string('estadoSolicitud');
          $table->double('precioTotal');
          $table->date('fechaAprobado');
          $table->boolean('activo');
          $table->string('numbSolicitud');
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
