<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('courseName');
            $table->string('courseCode')->unique();
            $table->foreignId('teacherID');
            $table->foreign('teacherID')->references('id')->on('teachers');
            $table->foreignId('roomID');
            $table->foreign('roomID')->references('id')->on('rooms');
            $table->foreignId('scheduleID');
            $table->foreign('scheduleID')->references('id')->on('schedules');
            $table->softDeletes();
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
        Schema::dropIfExists('courses');
    }
}
