<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageContractEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_contract_equipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_contract_id');
            $table->string('equipment_name');
            $table->double('quantity_as_per_contract')->nullable();
            $table->double('mobilized')->nullable();
            $table->double('total_available_now')->nullable();
            $table->string('status_of_equipment')->nullable();
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
        Schema::dropIfExists('package_contract_equipments');
    }
}
