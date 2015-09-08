<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSparePartTaskPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spare_part_task', function(Blueprint $table) {
            $table->integer('spare_part_id')->unsigned()->index();
            $table->foreign('spare_part_id')->references('part_id')->on('spare_parts')->onDelete('cascade');
            $table->integer('part_qty');
            $table->integer('task_id')->unsigned()->index();
            $table->foreign('task_id')->references('task_id')->on('tasks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('spare_part_task');
    }
}
