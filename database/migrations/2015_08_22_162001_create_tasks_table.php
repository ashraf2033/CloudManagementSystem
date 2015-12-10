<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('task_id');
            $table->string('task_name');
            $table->integer('machine_id')->unsigned();
            $table->foreign('machine_id')->references('machine_id')->on('machines')->onDelete('cascade');;
            $table->string('task_date');
            $table->string('task_type');
            $table->string('task_status');
          /*  $table->integer('tech_id')->unsigned();
            $table->foreign('tech_id')->references('id')->on('technicans'); */
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');;
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
        Schema::drop('tasks');
    }
}
