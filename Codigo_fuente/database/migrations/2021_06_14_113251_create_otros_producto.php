<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtrosProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('otro_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('autor');
            $table->string('fecha_elaboracion');
            $table->string('ciudad');
            $table->string('finalidad');
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
