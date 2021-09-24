<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserToCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Courses', function (Blueprint $table) {
            $table->bigInteger('users_id')->unsigned()->after('id');
            $table->foreign('users_id')->references('id')->on('Users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Courses', function (Blueprint $table) {
            $table->dropColumn('users_id');
        });
    }
}
