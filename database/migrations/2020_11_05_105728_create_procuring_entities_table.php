<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcuringEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procuring_entities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agency_id');
            $table->unsignedBigInteger('project_sub_component_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('agency_id')
                ->references('id')
                ->on('agencies')
                ->onDelete('cascade');

            $table->foreign('project_sub_component_id')
                ->references('id')
                ->on('project_sub_components')
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
        Schema::dropIfExists('procuring_entities');
    }
}
