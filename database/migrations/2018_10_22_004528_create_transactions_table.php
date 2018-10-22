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
            $table->string('name');
            $table->string('roomNo');
            $table->date('moveInDate')->nullable();
            $table->integer('totalPrice')->nullable();
            $table->integer('downPayment')->nullable();
            $table->string('downPaymentMonthlyAmortization')->nullable();
            $table->integer('monthlyAmortization')->nullable();
            $table->string('formOfPayment');
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
    }
}
