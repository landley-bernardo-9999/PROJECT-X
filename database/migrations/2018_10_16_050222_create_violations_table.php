<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViolationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dateReported')->nullable();
            
            $table->string('name');
            //  //set residentId as a foreign key
            // $table->integer('residentId')->unsigned()->after('id');
            // $table->foreign('residentId')->references('id')->on('residents')->onDelete('cascade');
            
            // //set roomNo as a foreign key
            // $table->string('repairRoomNo')->after('id');
            // $table->foreign('repairRoomNo')->references('roomNo')->on('rooms')->onDelete('cascade');
            $table->string('roomNo');
            $table->string('description');
            $table->longText('details');
            $table->date('dateCommitted')->nullable();
            $table->string('reportedBy');
            $table->integer('fine');
            $table->longText('actionTaken');
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
        Schema::dropIfExists('violations');
        
        //drop the foreign key
       $table->dropForeign('repair_residentId_foreign');
       $table->dropColumn('residentId');
   
         //drop the foreign key
       $table->dropForeign('repair_roomNo_foreign');
       $table->dropColumn('repairRoomNo');
    }
}
