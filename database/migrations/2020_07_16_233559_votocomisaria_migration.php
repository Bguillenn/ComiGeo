<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VotocomisariaMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voto_comisarias', function (Blueprint $table) {
            $table->string('ip','15')->primary();
            $table->integer('ComCod')->nullable();
            $table->integer('VotPun')->nullable();
            $table->foreign('ComCod')->references('ComCod')->on('comisarias');
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
        Schema::dropIfExists('voto_comisarias');
    }
}
