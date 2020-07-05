<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotoComisariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voto_comisarias', function (Blueprint $table) {
            //Definiendo columnas / Atributos
            $table->string('ip', 15);
            $table->integer('ComCod');
            $table->integer('VotPun');
            //Definiendo indices
            $table->primary('ip');
            $table->foreign('ComCod')
                    ->references('ComCod')
                    ->on('comisarias')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voto_comisarias');
    }
}
