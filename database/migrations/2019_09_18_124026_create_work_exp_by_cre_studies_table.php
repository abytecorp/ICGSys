<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkExpByCreStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_exp_by_cre_studies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('study_credit_id')->unsigned();
            $table->integer('work_information_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('us_cr')->unsigned();
            $table->timestamps();

            $table->foreign('study_credit_id')->references('id')->on('study_credits');
            $table->foreign('work_information_id')->references('id')->on('work_informations');
            $table->foreign('status_id')->references('id')->on('status');
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
        Schema::dropIfExists('work_exp_by_cre_studies');
    }
}
