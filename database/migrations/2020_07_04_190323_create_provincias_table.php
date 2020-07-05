<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provincias', function (Blueprint $table) {
            //Definiendo columnas / atributos
            $table->string('ProCod', 4);
            $table->string('ProNom', 30);
            $table->string('DepCod', 2);
            //Definiendo indices
            $table->primary('ProCod');
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
        Schema::dropIfExists('provincias');
    }
}
