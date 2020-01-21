<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
          $table->bigIncrements('idUser');
          $table->string('name')->nullable();
          $table->string('apellidos')->nullable();
          $table->string('pais')->nullable();
          $table->string('ciudad')->nullable();
          $table->boolean('active');
          $table->string('cc')->nullable();
          $table->date('fechaN')->nullable();
          $table->string('nombreEmpresa')->nullable();
          $table->string('nit')->nullable();
          $table->boolean('esEmpresa');
          $table->string('telefono')->nullable();
          $table->string('direccion')->nullable();
          $table->string('email')->unique();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');
          $table->rememberToken();
          $table->timestamps();
          $table->longText('descripcion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
