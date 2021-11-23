<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecomendacionSintoma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recomendacion_sintoma', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recomendacion_id');
            $table->unsignedBigInteger('sintoma_id');


            $table->foreign('recomendacion_id')->references('id')->on('recomendacions')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('sintoma_id')->references('id')->on('sintomas')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('recomendacion_sintoma');
    }
}
