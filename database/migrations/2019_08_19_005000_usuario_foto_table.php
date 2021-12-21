<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsuarioFotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_foto', function (Blueprint $table) {
            $table->id();           
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_foto');           
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('usuario')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_foto')->references('id')->on('foto')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_foto');
    }
}