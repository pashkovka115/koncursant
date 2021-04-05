<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateсompetitionUsersTable extends Migration
{
    public function up()
    {
        Schema::create('сompetition_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bid_id');
            $table->string('first_name')->nullable()->comment('имя');
            $table->string('last_name')->nullable()->comment('фамилия');
            $table->integer('quantity_person_diploma')->nullable()->comment('количество персональных дипломов');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('сompetition_users');
    }
}
