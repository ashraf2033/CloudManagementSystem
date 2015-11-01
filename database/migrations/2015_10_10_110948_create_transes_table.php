<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transes', function (Blueprint $table) {
            $table->increments('trans_id');
            $table->integer('part_id')->unsigned();
            $table->foreign('part_id')
            ->references('part_id')
            ->on('spare_parts')->onDelete('cascade');
            $table->integer('part_qty');
            $table->string('note');
            $table->string('type');
            $table->timestamps();
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')
            ->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transes');
    }
}
