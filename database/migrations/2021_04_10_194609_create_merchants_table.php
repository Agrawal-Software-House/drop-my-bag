<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('firm_name');
            $table->string('name');
            $table->string('phone_number',70)->unique();
            $table->string('gst')->nullable();
            $table->string('address')->nullable();
            $table->string('pincode')->nullable();
            $table->string('business_type')->nullable();
            $table->string('password');
            $table->string('avtar')->nullable();;
            $table->string('email',70)->unique();
            $table->boolean('status')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('merchants');
    }
}
