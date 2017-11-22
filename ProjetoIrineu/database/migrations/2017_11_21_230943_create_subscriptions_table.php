<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('selective_process_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->date('payment_date');
            $table->boolean('paid');
            $table->date('subscription_date');
            $table->timestamps();
        });

        Schema::table('subscriptions', function(Blueprint $table){
            $table->foreign('selective_process_id')
                  ->references('id')
                  ->on('selective_processes');
        });

        Schema::table('subscriptions', function(Blueprint $table){
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
        Schema::dropIfExists('subscriptions');
    }
}
