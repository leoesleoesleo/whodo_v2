<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoriaProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('categoriaProductos');
        Schema::create('categoriaProductos', function(Blueprint $table){
          $table->bigIncrements('idCategoriaProducto');
          $table->bigInteger('idCategoria')->unsigned();
          $table->foreign('idCategoria')->references('idCategoria')->on('categorias');
          $table->bigInteger('idProducto')->unsigned();
          $table->foreign('idProducto')->references('idProducto')->on('productos');
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
