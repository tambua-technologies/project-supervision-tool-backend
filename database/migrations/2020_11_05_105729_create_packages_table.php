<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procuring_entity_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('procuring_entity_id');
            $table->unsignedBigInteger('project_component_id')->nullable();
            $table->unsignedBigInteger('project_sub_component_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('procuring_entity_id')
                ->references('id')
                ->on('procuring_entities')
                ->onDelete('cascade');

            $table->foreign('project_component_id')
                ->references('id')
                ->on('project_components')
                ->onDelete('set null');

            $table->foreign('project_sub_component_id')
                ->references('id')
                ->on('project_sub_components')
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
        Schema::dropIfExists('procuring_entity_packages');
    }
}
