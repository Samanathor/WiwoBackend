<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacantesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_cargo');
            $table->text('descripcion')->nullable();
            $table->integer('tipo_jornada');
            $table->date('fecha_incorporacion')->nullable();
            $table->integer('nivel_experiencia')->nullable();
            $table->integer('subcategoria_id')->unsigned();
            $table->bigInteger('salario_inicial');
            $table->bigInteger('salario_final')->nullable();
            $table->integer('ciudad_id')->unsigned();
            $table->boolean('terminos_condiciones')->default(1);
            $table->integer('tipo_vacante');
            $table->bigInteger('creador_id')->unsigned();
            $table->integer('estado_vacante');
            $table->boolean('activo')->default(1);
            $table->integer('empresa_id')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->foreign('creador_id')->references('id')->on('users');
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vacantes');
    }
}
