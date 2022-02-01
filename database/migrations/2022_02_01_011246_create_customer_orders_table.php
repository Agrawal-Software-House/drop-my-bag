<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->id();

            $table->unSignedBigInteger('product_id');
            
            $table->string('amount');
            $table->string('quantity');
            $table->string('gst');
            $table->string('grand_amount');
            $table->unSignedBigInteger('customer_transaction_id');
            $table->softDeletes();

            $table->timestamps();

            $table->foreign('product_id')
                    ->references('id')
                    ->on('products');

            $table->foreign('customer_transaction_id')
                    ->references('id')
                    ->on('customer_transactions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_orders');
    }
}
