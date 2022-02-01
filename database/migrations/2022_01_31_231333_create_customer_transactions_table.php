<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('customer_transactions', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('payment_method_id');
            $table->string('order_no');
            $table->unSignedBigInteger('customer_address_id');
            $table->unSignedBigInteger('customer_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('payment_method_id')
                    ->references('id')
                    ->on('payment_methods');

            $table->foreign('customer_address_id')
                    ->references('id')
                    ->on('customer_addresses');

            $table->foreign('customer_id')
                    ->references('id')
                    ->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_transactions');
    }
}
