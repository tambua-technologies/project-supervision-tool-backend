<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('website');
            $table->unsignedBigInteger('focal_person_id');
            $table->unsignedBigInteger('agency_type_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('focal_person_id')
                ->references('id')
                ->on('focal_people')
                ->onDelete('set null');
            $table->foreign('agency_type_id')
                ->references('id')
                ->on('agency_types')
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
        Schema::dropIfExists('agencies');
    }
}
