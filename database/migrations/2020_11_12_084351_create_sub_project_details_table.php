<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubProjectDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_project_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('actor_id');
            $table->unsignedBigInteger('supervising_agency_id');
            $table->unsignedBigInteger('phase_id');
            $table->unsignedBigInteger('sub_project_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->unsignedBigInteger('contractor_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('actor_id')
                ->references('id')
                ->on('agencies')
                ->onDelete('set null');

            $table->foreign('supervising_agency_id')
                ->references('id')
                ->on('agencies')
                ->onDelete('set null');

            $table->foreign('contractor_id')
                ->references('id')
                ->on('agencies')
                ->onDelete('set null');

            $table->foreign('phase_id')
                ->references('id')
                ->on('phases')
                ->onDelete('set null');

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
        Schema::drop('sub_project_details');
    }
}
