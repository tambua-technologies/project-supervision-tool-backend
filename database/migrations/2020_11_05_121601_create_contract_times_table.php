<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractTimesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_times', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('start_date');
            $table->string('original_contract_period');
            $table->string('defects_liability_period');
            $table->string('time_extension_granted');
            $table->string('time_extension_applied_not_yet_granted');
            $table->dateTime('intended_completion_date');
            $table->dateTime('revised_completion_date');
            $table->float('time_percentage_lapsed_to_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contract_times');
    }
}
