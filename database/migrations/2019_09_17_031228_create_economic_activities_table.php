<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEconomicActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('economic_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('economic_activity');
            $table->longText('desc')->nullable();
            $table->integer('us_cr')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('us_cr')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('economic_activities');
    }
}
