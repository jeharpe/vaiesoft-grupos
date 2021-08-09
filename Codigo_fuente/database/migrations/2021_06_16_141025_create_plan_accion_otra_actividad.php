<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanAccionOtraActividad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('plan_accion_otra_actividad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('responsable');
            $table->string('fecha_realizacion');
            $table->string('producto');
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
