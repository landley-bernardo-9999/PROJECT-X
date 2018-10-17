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
    }
}
