<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreMedicamento');
            $table->double('precioNormal' , 10,2);
            $table->integer('descuento');
            $table->string('estado', 30 );
            $table->string('imagen')->nullable();
            $table->unsignedBigInteger('laboratorio_id')->nullable();
            $table->unsignedBigInteger('categoria_id')->nullable();

            $table->timestamps();

            $table->foreign('laboratorio_id')->references('id')->on('laboratorios')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->foreign('categoria_id')->references('id')->on('categorias')
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
        Schema::dropIfExists('medicamentos');
    }
}
