<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubProjectMilestonesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_project_milestones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->jsonb('tasks')->nullable();
            $table->unsignedBigInteger('sub_project_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sub_project_id')
                ->references('id')
                ->on('sub_projects')
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
        Schema::drop('sub_project_milestones');
    }
}
