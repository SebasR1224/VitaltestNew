<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentoRecomendacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamento_recomendacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicamento_id');
            $table->unsignedBigInteger('recomendacion_id');

            $table->foreign('medicamento_id')->references('id')->on('medicamentos')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('recomendacion_id')->references('id')->on('recomendacions')
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
        Schema::dropIfExists('medicamento_recomendacion');
    }
}
