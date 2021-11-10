<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('apellido1', 50);
            $table->string('apellido2', 50);
            $table->string('telefono', 30);
            $table->string('tipoDocumento', 30);
            $table->string('numDocumento', 30)->unique();
            $table->string('fechaNacimiento', 30);
            $table->string('direccion', 50);

            $table->unsignedBigInteger('user_id')->unique();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('profiles');
    }
}
