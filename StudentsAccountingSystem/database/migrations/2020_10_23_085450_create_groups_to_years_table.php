<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsToYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups_to_years', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id');
            $table->foreignId('year_id');
            $table->integer('grade');
            $table->foreignId("expel_reason_id");
        });
        Schema::table('groups_to_years', function (Blueprint $table) {
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('year_id')->references('id')->on('academic_years');
            $table->foreign("expel_reason_id")->references('id')->on("group_expel_reasons");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups_to_years');
    }
}
