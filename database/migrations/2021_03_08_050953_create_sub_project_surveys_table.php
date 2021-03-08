<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubProjectSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_project_surveys', function (Blueprint $table) {
            $table->id();
            $table->string('survey_id')->unique();
            $table->string('category_name');
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
        Schema::dropIfExists('sub_project_surveys');
    }
}
