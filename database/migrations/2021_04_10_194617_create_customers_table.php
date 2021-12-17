<?php

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
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email',100)->unique();
            $table->string('password');
            $table->string('gender');
            $table->string('phone_number',100)->unique()->nullable();
            $table->string('city')->nullable();
            $table->unSignedBigInteger('state_id')->nullable();
            $table->string('zip')->nullable();
            $table->boolean('terms_condition')->default(0);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('state_id')
                  ->references('id')
                  ->on('states');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}
