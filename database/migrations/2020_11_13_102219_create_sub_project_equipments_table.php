<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubProjectEquipmentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_project_equipments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('sub_project_id');
            $table->unsignedBigInteger('item_id');
            $table->double('quantity_per_contract');
            $table->double('quantity_mobilized');
            $table->string('remarks');
            $table->dateTime('mobilization_date');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('item_id')
                ->references('id')
                ->on('items')
                ->onDelete('set null');

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
        Schema::drop('sub_project_equipments');
    }
}
