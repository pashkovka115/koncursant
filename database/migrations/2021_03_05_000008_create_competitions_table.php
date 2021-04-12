<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionsTable extends Migration
{
    public $tableName = 'competitions';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('competition_type_id');
            $table->string('img')->nullable();
            $table->string('bg_img')->nullable();
            $table->string('date_start')->nullable()->comment('Дата проведения');
            $table->string('date_end')->nullable()->comment('Дата окончания подачи заявки');
            $table->enum('active', ['1', '0']);
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists($this->tableName);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
