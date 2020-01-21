<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Portafolioproductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('portafolioProductos');
        Schema::create('portafolioProductos', function(Blueprint $table){
            $table->bigIncrements('idPortafolioProducto');
            $table->bigInteger('idProducto')->unsigned();
            $table->foreign('idProducto')->references('idProducto')->on('productos');
            $table->bigInteger('idPortafolio')->unsigned();
            $table->foreign('idPortafolio')->references('idPortafolio')->on('portafolios');
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
