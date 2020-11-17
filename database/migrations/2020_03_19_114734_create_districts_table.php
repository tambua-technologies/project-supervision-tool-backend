<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDistrictsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function(Blueprint $table)
        {
            $table->string('id')->primary('districts_pkey');
            $table->string('adm0_en', 50)->nullable();
            $table->string('adm0_sw', 50)->nullable();
            $table->string('adm0_pcode', 50)->nullable();
            $table->string('adm1_en', 50)->nullable();
            $table->string('region_id', 50)->nullable();
            $table->multiPolygon('geom');
            $table->string('name', 50)->nullable();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('districts');
    }

}
