<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrolledStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolled_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('studentID');
            $table->foreign('studentID')->references('id')->on('students');
            $table->foreignId('termID');
            $table->foreign('termID')->references('id')->on('academic_terms');
            $table->foreignId('yearLevelID');
            $table->foreign('yearLevelID')->references('id')->on('year_levels');
            $table->foreignId('blockID');
            $table->foreign('blockID')->references('id')->on('blocks');
            $table->boolean('isRegular');
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
        Schema::dropIfExists('enrolled_students');
    }
}
