<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageContactProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_contract_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_contract_id');
            $table->double('actual_physical_progress')->nullable();
            $table->double('planned_physical_progress')->nullable();
            $table->double('actual_financial_progress')->nullable();
            $table->double('planned_financial_progress')->nullable();
            $table->date('progress_date');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('package_contract_id')
                ->references('id')
                ->on('procuring_entity_package_contracts')
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
        Schema::dropIfExists('package_contract_progress');
    }
}
