<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_answers', function (Blueprint $table) {
            $table->integer('id')->unsigned()->index();
            $table->integer('user_id')->unsigned();
            $table->integer('answer');
            $table->integer('exercise_id');
            $table->timestamps();
            $table->primary(array('id','user_id'));
            $table->foreign('id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_answers');
    }
}
