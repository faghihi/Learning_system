<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes_exercises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('class_id')->unsigned();
            $table->integer('course_id');
            $table->integer('section_id');
            $table->integer('easy_no');
            $table->integer('medium_no');
            $table->integer('hard_no');
            $table->integer('code');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes_exercises');
    }
}
