<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->bigIncrements('ChatID');
            $table->string('Type');
            $table->string('Description');
            $table->unsignedBigInteger('OrderID');
            $table->foreign('OrderID')->references('OrderID')->on('orders');
            $table->unsignedBigInteger('FollowUpID');
            $table->foreign('FollowUpID')->references('EmpID')->on('users');
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
        Schema::dropIfExists('chats');
    }
}
