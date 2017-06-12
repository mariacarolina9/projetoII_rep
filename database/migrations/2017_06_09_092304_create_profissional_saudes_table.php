<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfissionalSaudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profissional_saudes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_profissional')-> nullable();
            $table->string('instituicao_trabalho')-> nullable();
            $table->string('n_ordem')-> nullable();

            $table->integer('idUser')->unsigned();
            $table->foreign('idUser')->references('id')->on('users');

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
        Schema::dropIfExists('profissional_saudes');
    }
}
