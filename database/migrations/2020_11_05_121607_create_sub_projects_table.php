<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('description');
            $table->float('quantity')->nullable();
            $table->unsignedBigInteger('procuring_entity_package_id');
            $table->unsignedBigInteger('sub_project_type_id')->nullable();
            $table->unsignedBigInteger('sub_project_status_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('procuring_entity_package_id')
                ->references('id')
                ->on('procuring_entity_packages')
                ->onDelete('set null');

            $table->foreign('sub_project_type_id')
                ->references('id')
                ->on('sub_project_types')
                ->onDelete('set null');

            $table->foreign('sub_project_status_id')
                ->references('id')
                ->on('sub_project_statuses')
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
        Schema::dropIfExists('sub_projects');
    }
}
