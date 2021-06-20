<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('product_name');
            $table->text('slug');
            $table->unSignedBigInteger('category_id');
            $table->unSignedBigInteger('sub_category_id');
            $table->text('brand_name');
            $table->text('mrp_price');
            $table->text('selling_price');
            $table->boolean('returnable')->default(0);
            $table->text('product_image');
            $table->text('specification');
            $table->text('piece');
            $table->unSignedBigInteger('product_status_type_id');
            $table->boolean('active')->default(0);
            $table->unSignedBigInteger('merchant_id');
            $table->text('admin_note')->nullable();
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->foreign('sub_category_id')
                ->references('id')
                ->on('sub_categories')
                ->onDelete('cascade');

            $table->foreign('merchant_id')
                ->references('id')
                ->on('merchants')
                ->onDelete('cascade');

            $table->foreign('product_status_type_id')
                ->references('id')
                ->on('product_status_types')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
