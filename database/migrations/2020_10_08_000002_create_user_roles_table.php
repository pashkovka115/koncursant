<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRolesTable extends Migration
{
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();


            $table->index(["user_id"], 'fk_user_roles_user1_idx');
            $table->index(["role_id"], 'fk_user_roles_role1_idx');

            $table->foreign('user_id', 'fk_user_roles_user1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('role_id', 'fk_user_roles_role1_idx')
                ->references('id')->on('roles')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }


    public function down()
    {
        Schema::dropIfExists('user_roles');
    }
}
