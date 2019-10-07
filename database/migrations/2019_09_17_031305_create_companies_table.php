<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bs_name');
            $table->string('acronym')->nullable();
            $table->string('nit')->unique()->nullable();
            $table->integer('verification_digit')->nullable();
            $table->string('web')->nullable();
            $table->string('email')->unique();
            $table->string('address')->nullable();
            $table->string('logo')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('phone3')->nullable();
            $table->string('economic_activity')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('ec_ac_id')->unsigned()->nullable();
            $table->integer('us_cr')->unsigned();
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('ec_ac_id')->references('id')->on('economic_activities');
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
        Schema::dropIfExists('companies');
    }
}
