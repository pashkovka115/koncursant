<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgeGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('age_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('price')->default(0);
            $table->string('type')->nullable();
            $table->string('age')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('age_groups');
    }
}
