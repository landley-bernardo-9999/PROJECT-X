<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');

            //set residentId as a foreign key
            $table->integer('residentId')->unsigned();
            $table->foreign('residentId')->references('id')->on('residents')->onDelete('cascade');
            
            $table->date('moveInDate')->nullable();
            $table->date('moveOutDate')->nullable();
            $table->integer('securityDeposit');
            $table->integer('amountPaid');
            $table->string('reasonForMovingOut')->nullable();
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
        Schema::dropIfExists('transactions');

         //drop the foreign key
        $table->dropForeign('transaction_residentId_foreign');
        $table->dropColumn('residentId');
    }
}
