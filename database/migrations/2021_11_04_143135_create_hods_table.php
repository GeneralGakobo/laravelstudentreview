<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employment_type_id');
            $table->foreign('employment_type_id')->references('id')->on('employment_types');
            $table->unsignedBigInteger('staff_category_id');
            $table->foreign('staff_category_id')->references('id')->on('staff_categories');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('reference_no');
            $table->string('email');
            $table->string('designation');
            $table->unsignedBiginteger('department_id');
            $table->foreign('department_id')->references('id')->on('department');
            $table->string('mobile');
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
        Schema::dropIfExists('hods');
    }
}
