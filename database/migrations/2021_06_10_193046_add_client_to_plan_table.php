<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientToPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Plans', function (Blueprint $table) {
            $table->bigInteger('clients_id')->unsigned()->after('id');
            $table->foreign('clients_id')->references('id')->on('Clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Plans', function (Blueprint $table) {
            $table->dropColumn('clients_id');
        });
    }
}
