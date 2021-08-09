<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestigadorJoven extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('investigador_joven', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_investigador');
            $table->string('modalidad');
            $table->string('tutor');
            $table->string('propuesta');
            $table->string('periodo');
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