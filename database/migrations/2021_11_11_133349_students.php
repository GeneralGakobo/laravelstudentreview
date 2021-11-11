<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Students extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('reg_no');
            $table->string('email');
            $table->string('gender');
            $table->string('mobile');
            $table->string('image')->nullable()->change();
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->unsignedBigInteger('study_year_id');
            $table->foreign('study_year_id')->references('id')->on('study_years');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
