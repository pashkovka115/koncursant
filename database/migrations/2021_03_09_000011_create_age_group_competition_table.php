<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgeGroupCompetitionTable extends Migration
{
    public function up()
    {
        Schema::create('age_group_competition', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('competition_id');
            $table->unsignedBigInteger('age_group_id');


            $table->index(["competition_id"], 'fk_age_group_competition_competition1_idx');
            $table->index(["age_group_id"], 'fk_age_group_competition_age_group1_idx');

            $table->foreign('competition_id', 'fk_age_group_competition_competition1_idx')
                ->references('id')->on('competitions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('age_group_id', 'fk_age_group_competition_age_group1_idx')
                ->references('id')->on('age_groups')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }


    public function down()
    {
        Schema::dropIfExists('age_group_competition');
    }
}
