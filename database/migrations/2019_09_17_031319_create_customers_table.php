<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('document_type_id')->unsigned();
            $table->string('idn')->unique();
            $table->string('name');
            $table->string('first_last_name');
            $table->string('second_last_name');
            $table->date('birth_date');
            $table->integer('born_city')->unsigned();
            $table->string('address');
            $table->integer('address_city')->unsigned();
            $table->string('neighborhood');
            $table->string('cellphone');
            $table->string('phone')->nullable();
            $table->string('mail')->nullable();
            $table->integer('us_cr')->unsigned();
            $table->timestamps();

            $table->foreign('document_type_id')->references('id')->on('document_types');
            $table->foreign('born_city')->references('id')->on('cities');
            $table->foreign('address_city')->references('id')->on('cities');
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
        Schema::dropIfExists('customers');
    }
}
