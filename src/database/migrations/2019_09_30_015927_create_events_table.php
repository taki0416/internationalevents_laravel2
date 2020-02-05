<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('event_name');
            $table->dateTime('event_date');
            $table->dateTime('event_start_time');
            $table->integer('capacity');
            $table->text('venue');
            $table->text('event_details');
            $table->integer('created_id');
            $table->integer('updated_id');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->integer('deleted_id');
            $table->dateTime('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
