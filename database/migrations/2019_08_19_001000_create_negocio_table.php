<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNegocioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negocio', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 80)->unique();
            $table->string('imagen', 80);
            $table->unsignedBigInteger('nit');
            $table->unsignedBigInteger('telefono');
            $table->string('correo', 80);
            $table->string('direccion', 80);
            $table->string('mision', 180);
            $table->string('vision', 180);
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
        Schema::dropIfExists('negocio');
    }
}