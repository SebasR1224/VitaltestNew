<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecomendacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recomendacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombreRecomendacion');
            $table->unsignedBigInteger('parte_id')->nullable();
            $table->string('dosis');
            $table->string('frecuencia');
            $table->string('tiempo');
            $table->integer('intensidad');
            $table->integer('edadMin');
            $table->integer('edadMax');
            $table->unsignedBigInteger('imc_id')->nullable();
            $table->string('informacionAdicional')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();

            $table->foreign('parte_id')->references('id')->on('parte_cuerpos')
            ->onDelete('set null')
            ->onUpdate('cascade');



            $table->foreign('imc_id')->references('id')->on('imcs')
            ->onDelete('set null')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recomendacions');
    }
}
