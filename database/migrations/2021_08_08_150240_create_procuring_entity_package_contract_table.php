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
            $table->unsignedBigInteger('contractor_id')->nullable();
            $table->string('name');
            $table->string('contract_no')->nullable();
            $table->jsonb('original_contract_sum')->nullable();
            $table->jsonb('addendum_amount_to_the_contract')->nullable();
            $table->jsonb('revised_contract_sum')->nullable();
            $table->date('date_contract_agreement_signed')->nullable();
            $table->date('date_of_commencement_of_works')->nullable();
            $table->date('date_possession_of_site_given')->nullable();
            $table->date('date_of_end_of_mobilization_period')->nullable();
            $table->date('date_of_contract_completion')->nullable();
            $table->date('revised_date_of_contract_completion')->nullable();
            $table->double('defects_liability_notification_period')->nullable();
            $table->double('original_contract_period')->nullable();
            $table->double('revised_contract_period')->nullable();
            $table->double('actual_physical_progress')->nullable();
            $table->double('planned_physical_progress')->nullable();
            $table->double('financial_progress')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('procuring_entity_package_id')
                ->references('id')
                ->on('procuring_entity_packages')
                ->onDelete('cascade');

            $table->foreign('contractor_id')
                ->references('id')
                ->on('contractors')
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
        Schema::dropIfExists('procuring_entity_package_contracts');
    }
}
