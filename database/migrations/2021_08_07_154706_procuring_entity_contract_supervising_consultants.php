<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProcuringEntityContractSupervisingConsultants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procuring_entity_contract_supervising_consultants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('procuring_entity_contract_id');
            $table->unsignedBigInteger('agency_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procuring_entity_contract_supervising_consultants');
    }
}
