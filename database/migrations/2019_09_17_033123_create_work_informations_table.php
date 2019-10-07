<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id')->unsigned();
            $table->decimal('montly_income');
            $table->unsignedInteger('activity_id')->unsigned()->nullable();
            $table->unsignedInteger('company_id')->unsigned();
            $table->unsignedInteger('position_id')->unsigned()->nullable();
            $table->date('init_date');
            $table->longText('obs')->nullable();
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('us_cr');
            $table->timestamps();

            
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('activity_id')->references('id')->on('activities');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('position_id')->references('id')->on('positions');
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
        Schema::dropIfExists('work_informations');
    }
}
