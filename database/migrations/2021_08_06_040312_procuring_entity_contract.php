<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProcuringEntityContract extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procuring_entity_contract', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('procuring_entity_id');
            $table->string('name');
            $table->unsignedBigInteger('employer_id')->nullable(); // this is a user whose role is Municipal Director
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
        Schema::dropIfExists('procuring_entity_contract');
    }
}
