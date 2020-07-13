<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HumanResourceImplementingPartner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('human_resource_implementing_partner', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('human_resource_id');
            $table->unsignedBigInteger('implementing_partner_id');
            $table->timestamps();

            $table->foreign('human_resource_id')
                ->references('id')
                ->on('human_resources')
                ->onDelete('cascade');

            $table->foreign('implementing_partner_id')
                ->references('id')
                ->on('agencies')
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
        Schema::dropIfExists('human_resource_implementing_partner');
    }
}
