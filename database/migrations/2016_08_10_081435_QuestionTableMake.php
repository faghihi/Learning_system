<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuestionTableMake extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('section_id');
            $table->integer('exercise_id');
            $table->text('content');
            $table->string('options',400);
            $table->integer('answer');
            $table->integer('course_id');
            $table->text('solution');
            $table->string('writer');
            $table->integer('level');
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
        //
        Schema::drop('questions');
    }
}
