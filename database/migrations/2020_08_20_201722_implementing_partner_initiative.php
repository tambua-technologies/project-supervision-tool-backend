<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImplementingPartnerInitiative extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('implementing_partner_initiative', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('initiative_id');
            $table->unsignedBigInteger('implementing_partner_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('implementing_partner_initiative');
    }
}
