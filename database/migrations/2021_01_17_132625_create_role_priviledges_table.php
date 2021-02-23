<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePriviledgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_priviledges', function (Blueprint $table) {
            $table->unsignedBigInteger('RoleID');
            $table->unsignedBigInteger('PriviledgeID');
            $table->foreign('RoleID')->references('RoleID')->on('roles');
            $table->foreign('PriviledgeID')->references('PriviledgeID')->on('priviledges');
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
        Schema::dropIfExists('role_priviledges');
    }
}
