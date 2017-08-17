<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_score', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->integer('course_id');
            $table->integer('exercise_id');
            $table->integer('q_count');
            $table->integer('c_count');
            $table->integer('st_point');
            $table->integer('t_point');
            $table->double('percent');
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
    }
}
