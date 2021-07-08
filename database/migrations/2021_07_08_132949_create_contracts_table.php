<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contract_no');
            $table->unsignedBigInteger('contractor_id')->nullable();
            $table->foreign('contractor_id')->references('id')->on('agencies')->onDelete('set null');
            $table->unsignedBigInteger('supervising_agency_id')->nullable();
            $table->foreign('supervising_agency_id')->references('id')->on('agencies')->onDelete('set null');
            $table->unsignedBigInteger('procuring_entity_package_id')->nullable();
            $table->foreign('procuring_entity_package_id')->references('id')->on('procuring_entity_packages')->onDelete('set null');
            $table->unsignedBigInteger('contract_cost_id')->nullable();
            $table->unsignedBigInteger('contract_time_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('contract_cost_id')
            ->references('id')
                ->on('contract_costs')
                ->onDelete('set null');

            $table->foreign('contract_time_id')
            ->references('id')
                ->on('contract_times')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
