<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 80);
            $table->string('cliente', 80);  
            $table->string('correo', 80);
            $table->unsignedBigInteger('ci');
            $table->unsignedBigInteger('id_negocio');
            $table->date('fecha');
            $table->string('localizacion', 80);
            $table->string('descripcion', 80);
            $table->string('codigo_qr', 80);
            $table->time('hora');
            

            $table->foreign('id_negocio')->references('id')->on('negocio')->onUpdate('cascade')->onDelete('cascade');
           
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
        Schema::dropIfExists('evento');
    }
}