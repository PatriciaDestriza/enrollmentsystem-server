<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlockCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blockID');
            $table->foreign('blockID')->references('id')->on('blocks');
            $table->foreignId('courseID');
            $table->foreign('courseID')->references('id')->on('courses');
            $table->foreignId('termID');
            $table->foreign('termID')->references('id')->on('academic_terms');
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
        Schema::dropIfExists('block_courses');
    }
}
