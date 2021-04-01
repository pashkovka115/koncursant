<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffsTable extends Migration
{
    public function up()
    {
        Schema::create('tariffs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['solist', 'kollective']);
            $table->integer('duration')->comment('срок проверки в течении');
            $table->string('price');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('tariffs');
    }
}
