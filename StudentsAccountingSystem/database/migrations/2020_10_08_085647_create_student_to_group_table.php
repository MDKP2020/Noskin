<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentToGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_to_group', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->foreignId('group_id');
            $table->foreignId('start_year');
            $table->foreignId('end_year');
            $table->foreignId('next_group');
            $table->foreignId('expel_reason_id');
        });

        Schema::table('student_to_group', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('start_year')->references('id')->on('academic_years');
            $table->foreign('end_year')->references('id')->on('academic_years')->nullable();
            $table->foreign('next_group')->references('id')->on('groups')->nullable();
            $table->foreign('expel_reason_id')->references('id')->on('expel_reasons')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_to_group');
    }
}
