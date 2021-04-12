<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionNominationsTable extends Migration
{
    public function up()
    {
        Schema::create('competition_nomination', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('competition_id');
            $table->unsignedBigInteger('nomination_id');


            $table->index(["competition_id"], 'fk_competition_nominations_competition1_idx');
            $table->index(["nomination_id"], 'fk_competition_nominations_nomination1_idx');

            $table->foreign('competition_id', 'fk_competition_nominations_competition1_idx')
                ->references('id')->on('competitions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('nomination_id', 'fk_competition_nominations_nomination1_idx')
                ->references('id')->on('nominations')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }


    public function down()
    {
        Schema::dropIfExists('competition_nomination');
    }
}
