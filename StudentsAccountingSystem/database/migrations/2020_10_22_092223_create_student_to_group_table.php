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
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->foreignId('next_group')->nullable();
            $table->foreignId('expel_reason_id')->nullable();
        });

        Schema::table('student_to_group', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('next_group')->references('id')->on('groups');
            $table->foreign('expel_reason_id')->references('id')->on('expel_reasons');
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
