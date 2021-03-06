<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->string('roomNo')->primary();
            $table->string('building');
            $table->string('enrolled');
            $table->integer('longTermRent');
            $table->integer('shortTermRent');
            $table->string('roomStatus');
            $table->integer('size');
            $table->integer('capacity');
            $table->string('cover_image');
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
        Schema::dropIfExists('rooms');
    }
}
