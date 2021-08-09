<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->string('autor');
            $table->string('nombre');
            $table->string('finalidad');
            $table->string('fecha_creacion');
            $table->string('codigo_patente');
            $table->string('lugar');
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
