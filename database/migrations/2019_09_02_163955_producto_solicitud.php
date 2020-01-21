<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductoSolicitud extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('productoSolicitud');
        Schema::create('productoSolicitud', function(Blueprint $table){
          $table->bigIncrements('idProductoSolicitud');
          $table->bigInteger('idProducto')->unsigned();
          $table->foreign('idProducto')->references('idProducto')->on('productos');
          $table->bigInteger('idSolicitud')->unsigned();
          $table->foreign('idSolicitud')->references('idSolicitud')->on('solicitud');
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
