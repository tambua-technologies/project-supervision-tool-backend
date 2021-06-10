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
            $table->jsonb('shapefiles')->nullable();
            $table->string('color')->nullable();
            $table->string('code')->nullable();
            $table->unsignedBigInteger('project_status_id')->nullable();
            $table->string('country_id')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default('Active');
            $table->unsignedBigInteger('borrower_id')->nullable();
            $table->unsignedBigInteger('implementing_agency_id')->nullable();
            $table->unsignedBigInteger('funding_organisation_id')->nullable();
            $table->unsignedBigInteger('total_project_cost_id')->nullable();
            $table->unsignedBigInteger('commitment_amount_id')->nullable();
            $table->dateTime('approval_date')->nullable();
            $table->string('approval_fy')->nullable();
            $table->string('project_region')->nullable();
            $table->dateTime('closing_date')->nullable();
            $table->unsignedBigInteger('environmental_category_id')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
