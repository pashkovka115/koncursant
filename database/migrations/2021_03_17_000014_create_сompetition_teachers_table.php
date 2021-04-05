<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateсompetitionTeachersTable extends Migration
{
    public function up()
    {
        Schema::create('сompetition_teachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bid_id');
            $table->string('first_name')->nullable()->comment('имя');
            $table->string('last_name')->nullable()->comment('фамилия');
            $table->string('third_name')->nullable()->comment('отчество');
            $table->string('job')->nullable()->comment('должность');
            $table->enum('letter_print', ['0', '1'])->comment('печатное письмо препаду');
            $table->enum('letter_electro', ['0', '1'])->comment('электронное письмо препаду');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('сompetition_teachers');
    }
}
