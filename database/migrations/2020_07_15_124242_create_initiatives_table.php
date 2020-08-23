<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitiativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('initiatives', function (Blueprint $table) {
            $table->id();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('title');
            $table->text('description')->nullable();
            $table->jsonb('meta')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->unsignedBigInteger('actor_type_id')->nullable();
            $table->unsignedBigInteger('initiative_type_id')->nullable();
            $table->unsignedBigInteger('focal_person_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('focal_person_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('set null');

            $table->foreign('actor_type_id')
                ->references('id')
                ->on('types')
                ->onDelete('set null');

            $table->foreign('initiative_type_id')
                ->references('id')
                ->on('types')
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
        Schema::dropIfExists('initiatives');
    }
}
