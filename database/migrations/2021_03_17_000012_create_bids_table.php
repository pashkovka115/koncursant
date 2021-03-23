<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
 * Заявки
 */
class CreateBidsTable extends Migration
{
    public $tableName = 'bids';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('competition_id')->nullable();
            $table->unsignedBigInteger('nomination_id')->nullable()->comment('номинация');
            $table->unsignedBigInteger('direction_id')->nullable()->comment('напраление');
            $table->unsignedBigInteger('age_group_id')->nullable()->comment('возрастная группа');
            $table->unsignedBigInteger('tariff_id')->nullable()->comment('тариф');
//            $table->enum('type', ['festival', 'genre'])->nullable()->comment('фестивальный или жанровый');
            $table->string('count_people')->nullable()->comment('количество участников');
            $table->string('number_name')->nullable()->comment('название номера');
            $table->string('name_institution')->nullable()->comment('Название учебного заведения');
            $table->string('link_to_video')->nullable();
            $table->longText('comment')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('house')->nullable()->comment('номер дома');
            $table->string('apartment')->nullable()->comment('номер квартиры');
            $table->string('zip')->nullable()->comment('индекс');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
