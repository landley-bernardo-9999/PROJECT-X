<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dateReported');
            
            $table->string('name');
            //set residentId as a foreign key
            // $table->integer('residentId')->unsigned()->after('id');
            // $table->foreign('residentId')->references('id')->on('residents')->onDelete('cascade');
            $table->string('roomNo');
            //set roomNo as a foreign key
            // $table->string('repairRoomNo')->after('id');
            // $table->foreign('repairRoomNo')->references('roomNo')->on('rooms')->onDelete('cascade');
            
            //set personnelName as a foreign key 
            // $table->integer('personnelId')->unsigned()->after('id');
            // $table->foreign('personnelId')->references('id')->on('maintenances')->onDelete('cascade');
            $table->string('endorseTo');
            $table->string('desc');
            $table->integer('cost');
            $table->string('repairStatus');
            $table->date('dateFinished')->nullable();
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
        Schema::dropIfExists('repairs');

        // //drop the foreign key
        // $table->dropForeign('repair_residentId_foreign');
        // $table->dropColumn('residentId');

        // //drop the foreign key
        // $table->dropForeign('repair_roomNo_foreign');
        // $table->dropColumn('repairRoomNo');

        // //drop the foreign key
        // $table->dropForeign('repair_personnelId_foreign');
        // $table->dropColumn('personnelId');
        
    }
}
