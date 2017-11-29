<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->date('street'); 
            $table->string('number');
            $table->string('cep');
            $table->string('neighborhood');
            $table->string('typeaddress');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->integer('profile_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('address', function(Blueprint $table){
            $table->foreign('profile_id')
                  ->references('id')
                  ->on('profiles');
        });
   

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
}
