<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->string('postcode');
            $table->string('website');
            $table->string('logo_url');
            $table->timestamps();
        });

        Schema::create('room_time', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('difficulty', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('level');
            $table->timestamps();
        });

        Schema::create('theme', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('room', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('room_time_id');
            $table->unsignedBigInteger('difficulty_id');
            $table->string('name');
            $table->smallInteger('max_people');
            $table->string('description');
            $table->string('image_url');
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('company');
            $table->foreign('room_time_id')->references('id')->on('room_time');
            $table->foreign('difficulty_id')->references('id')->on('difficulty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room');
        Schema::dropIfExists('theme');
        Schema::dropIfExists('difficulty');
        Schema::dropIfExists('room_time');
        Schema::dropIfExists('company');
    }
}
