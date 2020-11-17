<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function(Blueprint $table)
        {
            $table->string('id')->primary('regions_pkey');
            $table->string('adm0_en', 50)->nullable();
            $table->string('adm0_sw', 50)->nullable();
            $table->string('adm0_pcode', 50)->nullable();
            $table->string('name', 50)->nullable();
            $table->multiPolygon('geom');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('regions');
    }

}
