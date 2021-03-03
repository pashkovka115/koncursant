<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('active', ['1', '0']);
            $table->longText('content')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
