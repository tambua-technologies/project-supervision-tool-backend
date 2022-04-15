<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProcuringEntityContract extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procuring_entity_contract', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('procuring_entity_id');
            $table->string('name');
            $table->string('contract_no')->nullable();
            $table->jsonb('original_contract_sum')->nullable();
            $table->jsonb('revised_contract_sum')->nullable();
            $table->date('original_signing_date')->nullable();
            $table->date('revised_signing_date')->nullable();
            $table->date('commencement_date')->nullable();
            $table->string('consortium_name')->nullable();
            $table->string('consultant_role_description')->nullable();
            $table->string('organisation_chart_url')->nullable();
            $table->date('revised_end_date_of_contract')->nullable();
            $table->date('end_date_of_contract')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('procuring_entity_id')
                ->references('id')
                ->on('procuring_entities')
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
        Schema::dropIfExists('procuring_entity_contract');
    }
}
