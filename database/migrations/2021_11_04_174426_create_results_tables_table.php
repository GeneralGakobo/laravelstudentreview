<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('semester_units_id');
            $table->foreign('semester_unit_id')->references('id')->on('semester_units');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->unsignedBigInteger('competency_id');
            $table->foreign('competency_id')->references('id')->on('competencies');
            $table->unsignedBigInteger('score_id');
            $table->foreign('score_id')->references('id')->on('competency_scores');
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
        Schema::dropIfExists('results_tables');
    }
}
