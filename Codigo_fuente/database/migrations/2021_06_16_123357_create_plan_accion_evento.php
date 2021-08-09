<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanAccionEvento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('plan_accion_evento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('caracter');
            $table->string('fecha_realizacion');
            $table->string('responsable');
            $table->string('institucion');
            $table->string('entidades');
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
