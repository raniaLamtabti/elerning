<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLevelToLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Lessons', function (Blueprint $table) {
            $table->bigInteger('levels_id')->unsigned()->after('id');
            $table->foreign('levels_id')->references('id')->on('Levels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Lessons', function (Blueprint $table) {
            $table->dropColumn('levels_id');
        });
    }
}
