<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ComisariaMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comisarias', function (Blueprint $table) {
            $table->integer('ComCod')->primary();
            $table->integer('ComCodInei')->nullable();
            $table->string('ComDepCod','2')->nullable();
            $table->string('ComProCod','4')->nullable();
            $table->string('ComDisCod','6')->nullable();
            $table->double('ComLat','12','8')->nullable();
            $table->double('ComLon','12','8')->nullable();
            $table->string('ComMacRegPol','40')->nullable();
            $table->string('ComRegPol','40')->nullable();
            $table->string('ComDivPol','40')->nullable();
            $table->string('ComNom','50')->nullable();
            $table->foreign('ComDepCod')->references('DepCod')->on('departamentos');
            $table->foreign('ComProCod')->references('ProCod')->on('provincias');
            $table->foreign('ComDisCod')->references('DisCod')->on('distritos');
            $table->timestamps();
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
