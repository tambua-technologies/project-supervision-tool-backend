<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSafeguardConcernsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('safeguard_concerns', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('package_id')->nullable();
            $table->unsignedInteger('procuring_entity_id')->nullable();
            $table->enum('concern_type', ['environmental','social','healthy and safety', 'other'])->default('other');
            $table->string('issue');
            $table->string('description')->nullable();
            $table->string('commitment')->nullable();
            $table->string('steps_taken')->nullable();
            $table->string('challenges')->nullable();
            $table->string('mitigation_measures')->nullable();
            $table->string('way_forward')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('procuring_entity_id')
                ->references('id')
                ->on('procuring_entities')
                ->onDelete('set null');

            $table->foreign('package_id')
                ->references('id')
                ->on('procuring_entity_packages')
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
        Schema::dropIfExists('safeguard_concerns');
    }
}
