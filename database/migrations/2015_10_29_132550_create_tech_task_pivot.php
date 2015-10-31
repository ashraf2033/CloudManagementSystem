<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechTaskPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_technican', function (Blueprint $table) {
          $table->integer('task_id')->unsigned();
          $table->foreign('task_id')->references('task_id')->on('tasks')->onDelete('cascade');
          $table->integer('technican_id')->unsigned();
            $table->foreign('technican_id')->references('id')->on('technicans')->onDelete('cascade');
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
        Schema::drop('task_technican');
    }
}
