<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Goal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('goal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->integer('ex_count');
            $table->integer('q_count');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->double('score');
            $table->timestamps();
            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('goal');
    }
}
