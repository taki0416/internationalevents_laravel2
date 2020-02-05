<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_participants', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('event_id');
            $table->unsignedInteger('participant_id');
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('participant_id')->references('id')->on('participants');
            $table->dateTime('application_date');
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
        Schema::dropIfExists('event_participants');
    }
}
