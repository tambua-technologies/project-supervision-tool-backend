<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageContractFinancials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_contract_financials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_contract_id');
            $table->integer('invoice_no');
            $table->string('particulars');
            $table->jsonb('amount');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('package_contract_financials');
    }
}
