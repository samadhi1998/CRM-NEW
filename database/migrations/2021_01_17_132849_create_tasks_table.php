<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('TaskID');
            $table->string('Status');
            $table->date('Due_Date');
            $table->string('Description');
            $table->timestamps();
            $table->unsignedBigInteger('ServicePersonID');
            $table->foreign('ServicePersonID')->references('EmpID')->on('users');
            $table->unsignedBigInteger('Added_By');
            $table->foreign('Added_By')->references('EmpID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
