<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('last_name_reading');
            $table->string('first_name_reading');
            $table->string('sex');
            $table->string('participant_phone');
            $table->string('participant_mail', 50);
            $table->string('participant_adress', 200);
            $table->string('country');
            $table->string('English');
            $table->string('language_1');
            $table->string('language_2')->nullable();
            $table->string('language_3')->nullable();
            $table->integer('created_id')->nullable();
            $table->integer('updated_id')->nullable();
            $table->integer('deleted_id')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
