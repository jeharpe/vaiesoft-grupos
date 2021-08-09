<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('publicacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->string('autor');
            $table->string('titulo');
            $table->string('medio_publicacion');
            $table->string('issn');
            $table->string('isb');
            $table->string('editorial');
            $table->string('volumen');
            $table->string('paginas');
            $table->string('fecha_publicacion');
            $table->string('ciudad');
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
