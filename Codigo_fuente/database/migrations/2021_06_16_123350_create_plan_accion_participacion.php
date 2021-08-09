<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanAccionParticipacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('plan_accion_participacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('tipo');
            $table->string('estudiante');
            $table->string('director');
            $table->string('programa');
            $table->string('institucion');
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
