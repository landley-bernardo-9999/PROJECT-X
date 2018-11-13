<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsInRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('repairs', function (Blueprint $table) {
            $table->string('concernDepartment')->nullable();
            $table->string('urgency')->nullable();
            $table->string('isWarranty')->nullable();
            $table->string('clientSatisfaction')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('repairs', function (Blueprint $table) {
            $table->drop('concernDepartment');
            $table->drop('urgency');
            $table->drop('satisfaction');
            $table->drop('underWarranty');
            $table->drop('clientSatisfaction');
        });
    }
}
