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
            $table->string('nome');
            $table->date('data');
            $table->string('rg');
            $table->string('emissorrg');
            $table->string('cpf');
            $table->string('sexo');
            $table->string('nomepai');
            $table->string('nomemae');
            $table->string('passaporte');
            $table->string('naturalidade');
            $table->string('emissorrg');
            $table->string('emissorrg');
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
