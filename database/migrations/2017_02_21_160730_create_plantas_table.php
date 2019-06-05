<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantas', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('dir_ip')->unique();
            $table->string('equipo');
            $table->integer('puerto_atm_fr')->nullable();
            $table->integer('puerto_metro')->nullable();
            $table->string('marca_equipo');
            $table->string('modelo_equipo');
            $table->string('region_equipo');
            $table->string('estado_equipo');
            $table->string('central_sise');
            $table->string('codigo_contable');
            $table->string('tipo_puerto');
            $table->date('fecha')->nullable();
      



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('plantas');
    }
}
