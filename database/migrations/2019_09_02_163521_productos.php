<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('productos');
        Schema::create('productos', function(Blueprint $table){
          $table->bigIncrements('idProducto');
          $table->string('nombre')->nullable();
          $table->string('referencia')->nullable();
          $table->string('precio')->nullable();
          $table->integer('cantidad')->nullable();
          $table->string('codigoBarras')->nullable();
          $table->boolean('activo')->nullable();
          $table->date('fechaVencimiento')->nullable();
          $table->string('nombrePortafolio')->nullable();
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
