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

            //Set roomNo as a foreign key
            $table->string('ownerRoomNo')->nullable();
            $table->foreign('ownerRoomNo')->references('roomNo')->on('rooms')->onDelete('cascade');

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

         //drop the foreign key
        $table->dropForeign('owner_roomNo_foreign');
        $table->dropColumn('ownerRoomNo');
    }
}
