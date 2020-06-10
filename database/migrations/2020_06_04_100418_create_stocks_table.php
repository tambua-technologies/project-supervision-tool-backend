<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->float('quantity');
            $table->float('pace_of_production');
            $table->string('frequency');
            $table->jsonb('meta')->nullable();
            $table->unsignedBigInteger('stock_status_id')->nullable();
            $table->unsignedBigInteger('stock_type_id');
            $table->unsignedBigInteger('stock_group_id')->nullable();
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('agency_id');
            $table->unsignedBigInteger('emergency_response_theme_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('agency_id')
                ->references('id')
                ->on('agencies')
                ->onDelete('set null');

            $table->foreign('stock_status_id')
                ->references('id')
                ->on('stock_statuses')
                ->onDelete('set null');

            $table->foreign('stock_type_id')
                ->references('id')
                ->on('stock_types')
                ->onDelete('set null');

            $table->foreign('stock_group_id')
                ->references('id')
                ->on('stock_groups')
                ->onDelete('set null');

            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('set null');

            $table->foreign('item_id')
                ->references('id')
                ->on('items')
                ->onDelete('set null');

            $table->foreign('emergency_response_theme_id')
                ->references('id')
                ->on('emergency_response_themes')
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
        Schema::dropIfExists('stocks');
    }
}
