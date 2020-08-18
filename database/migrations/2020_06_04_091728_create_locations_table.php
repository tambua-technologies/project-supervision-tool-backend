<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('level');
            $table->string("region_id")->nullable();
            $table->string("district_id")->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('district_id')
                ->references('id')
                ->on('districts')
                ->onDelete('set null');

            $table->foreign('region_id')
                ->references('id')
                ->on('regions')
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
        Schema::dropIfExists('locations');
    }
}
