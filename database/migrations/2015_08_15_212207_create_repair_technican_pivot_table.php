<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairTechnicanPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repair_technican', function(Blueprint $table) {
            $table->integer('repair_id')->unsigned()->index();
            $table->foreign('repair_id')->references('rep_id')->on('repairs')->onDelete('cascade');
            $table->integer('technican_id')->unsigned()->index();
            $table->foreign('technican_id')->references('id')->on('technicans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('repair_technican');
    }
}
