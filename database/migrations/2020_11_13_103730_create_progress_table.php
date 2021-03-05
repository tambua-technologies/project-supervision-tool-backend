<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->increments('id');
            $table->float('actual');
            $table->float('planned')->nullable();
            $table->float('ahead')->nullable();
            $table->float('behind')->nullable();
            $table->unsignedBigInteger('sub_project_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sub_project_id')
                ->references('id')
                ->on('sub_projects')
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
        Schema::drop('progress');
    }
}
