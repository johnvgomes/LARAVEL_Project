 ,.nukey765u4r<?php

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
            $table->string('escolaridade');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('profiles', function(Blueprint $table){
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
