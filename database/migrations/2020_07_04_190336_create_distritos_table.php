<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distritos', function (Blueprint $table) {
            //Definiendo las columnas / Atributos
            $table->string('DisCod', 6);
            $table->string('DisNom', 30);
            $table->string('ProCod', 4);
            $table->string('DepCod', 2);
            //Definiendo los indices
            $table->primary('DisCod');
            $table->foreign('ProCod')
                    ->references('ProCod')
                    ->on('provincias')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            $table->foreign('DepCod')
                    ->references('DepCod')
                    ->on('departamentos')
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
        Schema::dropIfExists('distritos');
    }
}
