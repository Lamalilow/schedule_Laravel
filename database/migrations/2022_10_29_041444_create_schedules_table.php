<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lessonTime_Id');
            $table->foreign('lessonTime_Id')->references('id')->on('lesson_times');
            $table->foreignId('classRoom_id');
            $table->foreign('classRoom_id')->references('id')->on('class_rooms');
            $table->foreignId('dayOfWeeks_id');
            $table->foreign('dayOfWeeks_id')->references('id')->on('day_of_weeks');
            $table->foreignId('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreignId('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreignId('group_id');
            $table->foreign('group_id')->references('id')->on('groups');
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
        Schema::dropIfExists('schedules');
    }
};
