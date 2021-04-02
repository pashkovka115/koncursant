<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionCompetitionTypeTable extends Migration
{
    public function up()
    {
        Schema::create('competition_competition_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('competition_id');
            $table->unsignedBigInteger('competition_type_id');


            $table->index(["competition_id"], 'fk_competition_type_competition_competition1_idx');
            $table->index(["competition_type_id"], 'fk_competition_type_competition_competition_type1_idx');

            $table->foreign('competition_id', 'fk_competition_type_competition_competition1_idx')
                ->references('id')->on('competitions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('competition_type_id', 'fk_competition_type_competition_competition_type1_idx')
                ->references('id')->on('competition_types')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }


    public function down()
    {
        Schema::dropIfExists('competition_competition_type');
    }
}
