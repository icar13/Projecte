<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTorneosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre');
            $table->dateTime('Fecha');
            $table->integer('MaxParticipantes');
            $table->enum('Juego', ['Hearthstone', 'Mario Kart', 'League of Legends', 'Overwatch']);
            $table->integer('Puntos');
            $table->String('name_user_create');
            $table->enum('Estado',['Pendiente','En Curso','Finalizado']);
            $table->rememberToken();
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
        Schema::dropIfExists('torneo');
    }
}
