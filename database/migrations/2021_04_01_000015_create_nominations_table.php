<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominationsTable extends Migration
{
    public function up()
    {
        Schema::create('nominations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('nominations');
    }
}
