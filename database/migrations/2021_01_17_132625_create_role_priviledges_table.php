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
            
            $table->unsignedBigInteger('ID');
            $table->unsignedBigInteger('PriviledgeID');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('ID')->references('RoleID')->on('roles')->onDelete('cascade');
            $table->foreign('PriviledgeID')->references('PriviledgeID')->on('priviledges')->onDelete('cascade');

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
