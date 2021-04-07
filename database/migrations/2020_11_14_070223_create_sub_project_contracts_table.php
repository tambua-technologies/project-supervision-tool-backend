<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubProjectContractsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_project_contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('contract_no')->nullable();
            $table->unsignedBigInteger('procuring_entity_package_id');
            $table->unsignedBigInteger('contract_cost_id')->nullable();
            $table->unsignedBigInteger('contract_time_id')->nullable();
            $table->unsignedBigInteger('contractor_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('procuring_entity_package_id')
                ->references('id')
                ->on('procuring_entity_packages')
                ->onDelete('set null');

            $table->foreign('contractor_id')
                ->references('id')
                ->on('agencies')
                ->onDelete('set null');

            $table->foreign('contract_cost_id')
                ->references('id')
                ->on('contract_costs')
                ->onDelete('cascade');

            $table->foreign('contract_time_id')
                ->references('id')
                ->on('contract_times')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sub_project_contracts');
    }
}
