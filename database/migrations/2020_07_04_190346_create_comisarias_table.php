<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComisariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comisarias', function (Blueprint $table) {
            //Definiendo las columnas / Atributos
            $table->integer('ComCod');
            $table->integer('ComCodInei');
            $table->string('ComDepCod', 2);
            $table->string('ComProCod', 4);
            $table->string('ComDisCod', 6);
            $table->float('ComLat');
            $table->float('ComLon');
            $table->string('ComMacRegPol', 40);
            $table->string('ComRegPol', 40);
            $table->string('ComDivPol', 40);
            $table->string('ComNom', 50);
            //Definiendo los indices
            $table->primary('ComCod');
            $table->foreign('ComDepCod')
                    ->references('DepCod')
                    ->on('departamentos')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            $table->foreign('ComProCod')
                    ->references('ProCod')
                    ->on('provincias')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            $table->foreign('ComDisCod')
                    ->references('DisCod')
                    ->on('distritos')
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
        Schema::dropIfExists('comisarias');
    }
}
