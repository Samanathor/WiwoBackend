<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sexo')->nullable();
            $table->integer('nivel_estudios')->nullable();
            $table->string('profesion')->nullable();
            $table->bigInteger('salario_minimo')->default(0);
            $table->bigInteger('salario_maximo')->default(0);
            $table->text('bio')->nullable();
            $table->bigInteger('referal_user_id')->unsigned()->nullable();
            $table->integer('verificacion_telefonica')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('referal_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('perfiles');
    }
}
