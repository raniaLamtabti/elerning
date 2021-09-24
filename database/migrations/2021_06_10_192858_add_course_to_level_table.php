<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCourseToLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Levels', function (Blueprint $table) {
            $table->bigInteger('courses_id')->unsigned()->after('id');
            $table->foreign('courses_id')->references('id')->on('Courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Levels', function (Blueprint $table) {
            $table->dropColumn('courses_id');
        });
    }
}
