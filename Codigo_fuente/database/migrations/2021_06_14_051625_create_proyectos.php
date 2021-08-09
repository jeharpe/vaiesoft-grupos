<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('proyecto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('investigador_director');
            $table->string('coinvestigador_asesor');
            $table->string('estudiantes');
            $table->string('tipo');
            $table->string('estado');
            $table->string('linea_investigacion');
            $table->string('fecha_inicio');
            $table->string('fecha_fin');
            $table->string('tiempo_ejecucion');
            $table->string('resumen');
            $table->string('obj_general');
            $table->string('obj_esécifico');
            $table->string('resultados');
            $table->string('costo_total');
            $table->string('fuentes_financiacion');
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
