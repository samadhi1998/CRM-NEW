<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('OrderID');
            $table->string('Description')->nullable();
            $table->string('Status')->nullable();
            $table->integer('Rate')->nullable();
            $table->date('Due_date')->nullable();
            $table->string('Feedback')->nullable();
            $table->string('Progress')->nullable();
            $table->integer('Advance')->nullable();
            $table->integer('Total_Price')->nullable();
            $table->integer('Discount')->nullable();
            $table->unsignedBigInteger('CustomerID')->nullable();
            $table->foreign('CustomerID')->references('CustomerID')->on('customers');
            $table->unsignedBigInteger('QuotationEmpID')->nullable();
            $table->foreign('QuotationEmpID')->references('EmpID')->on('users');
            $table->unsignedBigInteger('FollowUpID')->nullable();
            $table->foreign('FollowUpID')->references('EmpID')->on('users');
            $table->unsignedBigInteger('CustomerCareID')->nullable();
            $table->foreign('CustomerCareID')->references('EmpID')->on('users');
            $table->unsignedBigInteger('TaskID')->nullable();
            $table->foreign('TaskID')->references('TaskID')->on('tasks');
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
        Schema::dropIfExists('orders');
    }
}
