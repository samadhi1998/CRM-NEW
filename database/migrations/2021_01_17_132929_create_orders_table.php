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
            $table->string('Description');
            $table->string('Status');
            $table->integer('Rate');
            $table->date('Due_date');
            $table->string('Feedback');
            $table->string('Progress');
            $table->integer('Advance');
            $table->integer('Total_Price');
            $table->integer('Discount');
            $table->unsignedBigInteger('CustomerID');
            $table->foreign('CustomerID')->references('CustomerID')->on('customers');
            $table->unsignedBigInteger('QuotationEmpID');
            $table->foreign('QuotationEmpID')->references('EmpID')->on('users');
            $table->unsignedBigInteger('FollowUpID');
            $table->foreign('FollowUpID')->references('EmpID')->on('users');
            $table->unsignedBigInteger('CustomerCareID');
            $table->foreign('CustomerCareID')->references('EmpID')->on('users');
            $table->unsignedBigInteger('TaskID');
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
