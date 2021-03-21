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
            $table->string('Status')->nullable()->default("Active");
            $table->unsignedBigInteger('AdminID');
            $table->foreign('AdminID')->references('EmpID')->on('users');
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
        Schema::dropIfExists('products');
    }
}
