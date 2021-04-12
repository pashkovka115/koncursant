<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionTypesTable extends Migration
{
    public function up()
    {
        Schema::create('competition_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('type', ['amateur', 'professional']);

            $table->longText('conditions')->nullable()->comment('Условия участия');
            $table->longText('email_description')->nullable()->comment('почта и описание оргкомитета');
            $table->longText('reward')->nullable()->comment('Система оценки и награждения');
            $table->longText('rank')->nullable()->comment('Звания');
            $table->longText('nominations')->nullable()->comment('Номинации');
            $table->string('diploma')->nullable()->comment('Пример диплома');
            $table->longText('cost')->nullable()->comment('Стоимость участия');
        });
    }


    public function down()
    {
        Schema::dropIfExists('competition_types');
    }
}
