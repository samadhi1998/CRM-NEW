<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->unsignedBigInteger('order_OrderID')->nullable();
            $table->unsignedBigInteger('product_ProductID')->nullable();
            $table->unsignedBigInteger('Qty');
            $table->integer('Discounts')->nullable();
            $table->foreign('order_OrderID')->references('OrderID')->on('orders')->onDelete('cascade');
            $table->foreign('product_ProductID')->references('ProductID')->on('products')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}
