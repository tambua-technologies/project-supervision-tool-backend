<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('wb_project_id')->unique();
            $table->string('name');
            $table->string('layer_typename')->nullable();
            $table->string('color')->nullable();
            $table->string('code')->nullable();
            $table->unsignedBigInteger('project_status_id')->nullable();
            $table->string('country_id')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_status_id')
                ->references('id')
                ->on('project_statuses')
                ->onDelete('set null');

            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
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
        Schema::dropIfExists('projects');
    }
}
