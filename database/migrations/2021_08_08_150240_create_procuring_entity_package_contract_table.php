<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcuringEntityPackageContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procuring_entity_package_contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('procuring_entity_package_id');
            $table->unsignedBigInteger('contractor_id');
            $table->string('name');
            $table->string('contract_no');
            $table->jsonb('original_contract_sum');
            $table->date('date_contract_agreement_signed');
            $table->date('date_of_commencement_of_works');
            $table->date('date_possession_of_site_given');
            $table->date('date_of_end_of_mobilization_period');
            $table->date('date_of_contract_completion');
            $table->date('revised_date_of_contract_completion');
            $table->date('defects_liability_notification_period');
            $table->double('original_contract_period');
            $table->double('revised_contract_period');
            $table->double('actual_physical_progress');
            $table->double('planned_physical_progress');
            $table->double('financial_progress');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procuring_entity_package_contracts');
    }
}
