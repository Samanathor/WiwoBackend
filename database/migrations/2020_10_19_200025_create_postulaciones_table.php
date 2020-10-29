<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostulacionesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('postulante_id')->unsigned();
            $table->integer('vacante_id')->unsigned();
            $table->boolean('respuesta_postulante')->nullable();
            $table->boolean('respuesta_empleador')->nullable();
            $table->boolean('activo')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('postulante_id')->references('id')->on('users');
            $table->foreign('vacante_id')->references('id')->on('vacantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('postulaciones');
    }
}
