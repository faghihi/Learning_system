<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TempAnswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tempanswer', function (Blueprint $table) {
            $table->integer('id')->unsigned()->index();
            $table->string('username');
            $table->integer('answer');
            $table->integer('exercise_id');
            $table->timestamps();
            $table->primary(array('id','username'));
            $table->foreign('id')->references('id')->on('questions')->onDelete('cascade');
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
        Schema::drop('tempanswer');
    }
}
