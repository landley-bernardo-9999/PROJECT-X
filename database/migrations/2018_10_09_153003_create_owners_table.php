<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('owners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('roomNo');
            $table->string('name');
            $table->date('birthDate')->nullable();
            $table->string('mobileNumber')->unique()->nullable();
            $table->string('emailAddress')->unique()->nullable();
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
        Schema::dropIfExists('owners');
       

    }
}
