<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdolescentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adolescentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname')-> nullable();
            $table->double('altura')-> nullable();
            $table->double('peso')-> nullable();
            $table->string('obj_pessoais')-> nullable();
            $table->string('historial')-> nullable();

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
        Schema::dropIfExists('adolescentes');
    }
}
