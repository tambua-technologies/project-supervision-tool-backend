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
            $table->id();
            $table->string('project_id');
            $table->boolean('status')->default(false);
            $table->unsignedBigInteger('borrower_id')->nullable();
            $table->unsignedBigInteger('implementing_agency_id')->nullable();
            $table->unsignedBigInteger('funding_organisation_id')->nullable();
            $table->unsignedBigInteger('coordinating_agency_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('total_project_cost_id')->nullable();
            $table->unsignedBigInteger('commitment_amount_id')->nullable();
            $table->dateTime('approval_date')->nullable();
            $table->date('approval_fy')->nullable();
            $table->string('project_region')->nullable();
            $table->dateTime('closing_date')->nullable();
            $table->unsignedBigInteger('environmental_category_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');

            $table->foreign('implementing_agency_id')
                ->references('id')
                ->on('agencies')
                ->onDelete('set null');

            $table->foreign('funding_organisation_id')
                ->references('id')
                ->on('agencies')
                ->onDelete('set null');

            $table->foreign('borrower_id')
                ->references('id')
                ->on('agencies')
                ->onDelete('set null');

            $table->foreign('coordinating_agency_id')
                ->references('id')
                ->on('agencies')
                ->onDelete('set null');

            $table->foreign('country_id')
                ->references('id')
                ->on('locations')
                ->onDelete('cascade');

            $table->foreign('total_project_cost_id')
                ->references('id')
                ->on('money')
                ->onDelete('cascade');

            $table->foreign('commitment_amount_id')
                ->references('id')
                ->on('money')
                ->onDelete('cascade');

            $table->foreign('environmental_category_id')
                ->references('id')
                ->on('environmental_categories')
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
        Schema::drop('project_details');
    }
}
