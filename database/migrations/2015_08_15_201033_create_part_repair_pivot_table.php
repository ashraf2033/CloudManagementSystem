<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartRepairPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_repair', function(Blueprint $table) {
            $table->integer('part_id')->unsigned()->index();
            $table->foreign('part_id')->references('part_id')->on('spare_parts');
            $table->integer('repair_id')->unsigned()->index();
            $table->foreign('repair_id')->references('rep_id')->on('repairs')->onDelete('cascade');
            $table->integer('part_qty');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('part_repair');
    }
}
