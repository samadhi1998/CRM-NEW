<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_charges', function (Blueprint $table) {
            $table->bigIncrements('ExtraChargeID');
            $table->string('Type');
            $table->integer('Amount');
            $table->string('Description');
            $table->unsignedBigInteger('OrderID');
            $table->foreign('OrderID')->references('OrderID')->on('orders');
            $table->unsignedBigInteger('ServicePersonID');
            $table->foreign('ServicePersonID')->references('EmpID')->on('users');
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
        Schema::dropIfExists('extra_charges');
    }
}
