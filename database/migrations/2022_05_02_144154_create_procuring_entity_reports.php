<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcuringEntityReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procuring_entity_reports', function (Blueprint $table) {
            $table->id();
            $table->text('report_title');
            $table->longText('summary');
            $table->integer('report_number');
            $table->date('start');
            $table->date('end');
            $table->unsignedBigInteger('procuring_entity_id');
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('procuring_entity_id')
                ->references('id')
                ->on('procuring_entities')
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
        Schema::dropIfExists('procuring_entity_reports');
    }
}
