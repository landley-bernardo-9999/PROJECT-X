<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('residents', function (Blueprint $table) {
            $table->increments('id');

            //set roomNo as a foreign key
            $table->string('residentRoomNo')->nullable();
            $table->foreign('residentRoomNo')->references('roomNo')->on('rooms')->onDelete('cascade');

            $table->string('name');
            $table->date('birthDate')->nullable();
            $table->string('residentStatus');
            $table->string('school')->nullable();
            $table->string('course')->nullable();
            $table->integer('yearLevel')->nullable();
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
        Schema::dropIfExists('residents');

        //drop the foreign key
       $table->dropForeign('resident_roomNo_foreign');
       $table->dropColumn('residentRoomNo');  
    }
}
