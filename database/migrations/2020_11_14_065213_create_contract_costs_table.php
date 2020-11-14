<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractCostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_costs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('contract_award_value_id')->nullable();
            $table->unsignedBigInteger('certified_work_to_date_value_id')->nullable();
            $table->float('works_certified_to_date_percentage')->nullable();
            $table->unsignedBigInteger('financial_penalties_applied_value_id')->nullable();
            $table->unsignedBigInteger('financial_penalties_granted_value_id')->nullable();
            $table->unsignedBigInteger('variations_granted_value_id')->nullable();
            $table->unsignedBigInteger('variations_applied_not_yet_granted_value_id')->nullable();
            $table->unsignedBigInteger('estimated_final_contract_price_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('contract_award_value_id')
                ->references('id')
                ->on('money')
                ->onDelete('cascade');

            $table->foreign('certified_work_to_date_value_id')
                ->references('id')
                ->on('money')
                ->onDelete('cascade');

            $table->foreign('financial_penalties_applied_value_id')
                ->references('id')
                ->on('money')
                ->onDelete('cascade');

            $table->foreign('financial_penalties_granted_value_id')
                ->references('id')
                ->on('money')
                ->onDelete('cascade');

            $table->foreign('variations_granted_value_id')
                ->references('id')
                ->on('money')
                ->onDelete('cascade');

            $table->foreign('variations_applied_not_yet_granted_value_id')
                ->references('id')
                ->on('money')
                ->onDelete('cascade');

            $table->foreign('estimated_final_contract_price_id')
                ->references('id')
                ->on('money')
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
        Schema::drop('contract_costs');
    }
}
