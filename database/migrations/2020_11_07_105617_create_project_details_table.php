<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_id');
            $table->boolean('status');
            $table->string('borrower');
            $table->unsignedBigInteger('implementing_agency_id');
            $table->unsignedBigInteger('funding_organisation_id');
            $table->unsignedBigInteger('coordinating_agency_id');
            $table->unsignedBigInteger('location_id');
            $table->double('total_project_cost');
            $table->dateTime('approval_date');
            $table->date('approval_fy');
            $table->string('project_region');
            $table->dateTime('closing_date');
            $table->unsignedBigInteger('environmental_category_id');
            $table->double('commitment_amount');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_details');
    }
}
