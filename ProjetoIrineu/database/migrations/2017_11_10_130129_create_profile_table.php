<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNecessidadesespeciaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('date');
            $table->string('rg');
            $table->string('rg-emitter');
            $table->string('cpf');
            $table->string('sex');
            $table->string('namefather');
            $table->string('namemother');
            $table->string('passport');
            $table->string('naturaless');
            $table->string('phone');
            $table->string('mobile');
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
        Schema::dropIfExists('necessidadesespeciais');
    }
}
