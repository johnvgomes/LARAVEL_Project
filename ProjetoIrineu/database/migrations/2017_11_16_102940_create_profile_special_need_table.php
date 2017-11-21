<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

<<<<<<< HEAD
class CreateProfileSpecialNeedTable extends Migration
=======
class CreateProfileSpecialneedTable extends Migration
>>>>>>> 60b9dbc57f330eed6e2a92569634760a14283f08
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_special_need', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')->unsigned();
            $table->integer('special_need_id')->unsigned();
            $table->integer('permanent');
            $table->string('observation');
            $table->timestamps();
        });
        
        Schema::table('profile_special_need', function(Blueprint $table){
            $table->foreign('profile_id')
                  ->references('id')
                  ->on('profiles');
        });

        Schema::table('profile_special_need', function(Blueprint $table){
            $table->foreign('special_need_id')
                  ->references('id')
                  ->on('special_needs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_specialneed');
    }
}
