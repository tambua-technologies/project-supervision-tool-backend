<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProcuredProjectSubComponents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procured_project_sub_components', function (Blueprint $table) { $table->id();
            $table->unsignedBigInteger('project_sub_component_id');
            $table->unsignedBigInteger('procuring_entity_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_sub_component_id')
                ->references('id')
                ->on('project_components')
                ->onDelete('cascade');

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
        Schema::dropIfExists('procured_project_sub_components');
    }
}
