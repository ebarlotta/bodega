<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analises', function (Blueprint $table) {
            $table->id();

            $table->date('FechaAnalisis');
            $table->double('Az');
            $table->double('Alc');
            $table->double('Ph');
            $table->double('AcTot');
            $table->double('AcVol');
            $table->double('SOLibre');
            $table->double('SOTotal');
            $table->double('Color');
            $table->double('LC');
            $table->double('Matiz');
            $table->unsignedBigInteger('IdPileta');
            $table->foreign('IdPileta')->references('id')->on('Piletas');
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
        Schema::dropIfExists('analises');
    }
}
