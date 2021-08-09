<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestigadorDocente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('investigador_docente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_investigador');
            $table->string('codigo');
            $table->string('departamento');
            $table->string('dedicacion');
            $table->string('estudios');
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
