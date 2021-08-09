<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanAccionProyecto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('plan_accion_proyecto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('objetivos');
            $table->string('actividades');
            $table->string('fecha_inicio');
            $table->string('fecha_fin');
            $table->string('responsable');
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
