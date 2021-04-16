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
            $table->bigIncrements('ProductID');
            $table->string('Name');
            $table->string('Brand');
            $table->mediumText('image')->nullable();
            $table->string('Description');
            $table->string('Warranty');
            $table->integer('Price');
            $table->integer('Qty');
            $table->integer('ReOrderLevel');
            $table->string('Status')->nullable()->default("In Stock");
            $table->integer('stock_defective')->nullable()->default(0);
            $table->unsignedBigInteger('AdminID');
            $table->foreign('AdminID')->references('EmpID')->on('users');
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
        Schema::dropIfExists('products');
    }
}
