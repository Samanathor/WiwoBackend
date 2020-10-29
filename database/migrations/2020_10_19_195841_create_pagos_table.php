<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_plan_id')->unsigned();
            $table->bigInteger('value');
            $table->string('tipo')->nullable();
            $table->date('fecha_realizacion');
            $table->string('payment_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_plan_id')->references('id')->on('planes_usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pagos');
    }
}
