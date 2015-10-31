<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFailuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('failures', function (Blueprint $table) {
            $table->increments('fail_id');
            $table->string('fail_name');
            $table->integer('machine_id')->unsigned();
            $table->timestamp('fail_time');
            $table->string('fail_type');
            $table->string('shift');
            $table->text('fail_details');
            $table->string('fail_importance');
            $table->text('fail_notes');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->integer('status');
            $table->timestamps();

        });


        Schema::table('failures', function($table) {
       $table->foreign('machine_id')
            ->references('machine_id')
            ->on('machines')->onDelete('cascade');

   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('failures');
    }
}
