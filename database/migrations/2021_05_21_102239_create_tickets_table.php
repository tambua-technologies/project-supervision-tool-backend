<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->text('description');
            $table->unsignedBigInteger('project_id');
            $table->point('location')->nullable(); // A geo point of where service ticket(issue) happened.
            $table->text('address')->nullable(); // A human entered address or description of location where service ticket(issue) happened.
            $table->float('ttr')->nullable();
            $table->date('expected_at')->nullable(); // A time when the issue is expected to be resolved.
            $table->date('resolved_at')->nullable(); // A time when the issue was resolved.
            $table->unsignedBigInteger('agency_responsible_id')->nullable(); // A time taken to resolve the ticket. Used to calculate Mean Time To Resolve(MTTR) KPI.
            $table->unsignedBigInteger('priority_id')->nullable(); // It used to weight a ticket(issue) relative to other(s).
            $table->unsignedBigInteger('operator_id')->nullable(); // A party oversee the work on the  ticket(issue). It also a party that is answerable for the progress and status of the ticket(issue) to a reporter.
            $table->unsignedBigInteger('assignee_id')->nullable(); // A party oversee the work on the  ticket(issue). It also a party that is answerable for the progress and status of the ticket(issue) to an operator and overall agency administrative structure.
            $table->unsignedBigInteger('reporter_id')->nullable(); // A party that reported the  ticket(issue).
            $table->unsignedBigInteger('ticket_reporting_method_id')->nullable(); // A party that reported the  ticket(issue).
            $table->unsignedBigInteger('ticket_status_id')->nullable(); // A current status of the service ticket(issue).It used to track ticket pipeline.
            $table->unsignedBigInteger('ticket_type_id')->nullable();
            $table->unsignedBigInteger('component_id')->nullable();
            $table->unsignedBigInteger('sub_component_id')->nullable();
            $table->unsignedBigInteger('procuring_entity_id')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->unsignedBigInteger('sub_project_id')->nullable();
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('set null');

            $table->foreign('component_id')
                ->references('id')
                ->on('project_components')
                ->onDelete('set null');

            $table->foreign('sub_component_id')
                ->references('id')
                ->on('project_sub_components')
                ->onDelete('set null');

            $table->foreign('procuring_entity_id')
                ->references('id')
                ->on('procuring_entities')
                ->onDelete('set null');

            $table->foreign('package_id')
                ->references('id')
                ->on('procuring_entity_packages')
                ->onDelete('set null');

            $table->foreign('sub_project_id')
                ->references('id')
                ->on('sub_projects')
                ->onDelete('set null');

            $table->foreign('agency_responsible_id')
                ->references('id')
                ->on('agencies')
                ->onDelete('set null');

            $table->foreign('priority_id')
                ->references('id')
                ->on('ticket_priorities')
                ->onDelete('set null');

            $table->foreign('operator_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->foreign('assignee_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->foreign('reporter_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('tickets');
    }
}
