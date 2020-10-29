<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('identificacion')->nullable();
            $table->integer('ciudad_id')->unsigned();
            $table->string('direccion');
            $table->string('email')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('video')->nullable();
            $table->integer('categoria_id')->unsigned();
            $table->text('beneficios')->nullable();
            $table->string('tamano')->nullable();
            $table->string('tipos_contratacion');
            $table->string('frecuencia_contrato');
            $table->boolean('activo')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empresas');
    }
}
