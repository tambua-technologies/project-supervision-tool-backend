<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PackageContractStaffs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_contract_staffs', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('remarks')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
            $table->unsignedBigInteger('procuring_entity_package_contract_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('position_id')
                ->references('id')
                ->on('positions')
                ->onDelete('set null');

            $table->foreign('procuring_entity_package_contract_id')
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
        Schema::dropIfExists('package_contract_staffs');
    }
}
