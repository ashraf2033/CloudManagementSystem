<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->increments('rep_id');
            $table->timestamp('rep_date');
            $table->integer('rep_dur');
            $table->integer('tech_no');
            $table->string('rep_status');
            $table->text('rep_details');
            $table->timestamps();
            $table->integer('fail_id')->unsigned();
            $table->foreign('fail_id')->references('fail_id')->on('failures')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('repairs');
    }
}
