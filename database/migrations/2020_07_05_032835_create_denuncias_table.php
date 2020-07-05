<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenunciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denuncias', function (Blueprint $table) {
            //Definiendo columnas / atributos
            $table->integer('DenCod');
            $table->enum('DenGen', ['F', 'M']);
            $table->integer('DenEda');
            $table->string('DenMes');
            //Estableciendo indices
            $table->primary('DenCod');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('denuncias');
    }
}
