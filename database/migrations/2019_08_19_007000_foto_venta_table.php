<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FotoVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_venta', function (Blueprint $table) {
            $table->id();     
            $table->unsignedBigInteger('id_foto');      
            $table->unsignedBigInteger('id_venta');                       
            $table->timestamps();

            $table->foreign('id_venta')->references('id')->on('venta')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_foto')->references('id')->on('usuario_foto')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foto_venta');
    }
}