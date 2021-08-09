<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GrupoInvestigacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_investigacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->string('sigla');
            $table->date('fecha_creacion');
            $table->string('fecha_gruplac');
            $table->string('codigo_gruplac');
            $table->string('clas_colciencias');
            $table->string('cate_colciencias');
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
