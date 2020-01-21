<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('pedido');
        Schema::create('pedido', function(Blueprint $table){
          $table->bigIncrements('idPedido');
          $table->string('pedido');
          $table->longText('descripcion');
          $table->date('fechaEntrega');
          $table->string('estado');
          $table->integer('idUsuario');
          $table->boolean('activo');
          $table->timestamps();
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
