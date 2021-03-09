<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgeGroupCompetitionTypesTable extends Migration
{
    public $tableName = 'age_group_competition_type';

    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('competition_type_id');
            $table->unsignedBigInteger('age_group_id');


            $table->index(["competition_type_id"], 'fk_competition_type_age_groups_competition_type1_idx');
            $table->index(["age_group_id"], 'fk_competition_type_age_groups_age_group1_idx');

            $table->foreign('competition_type_id', 'fk_competition_type_age_groups_competition_type1_idx')
                ->references('id')->on('competition_types')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('age_group_id', 'fk_competition_type_age_groups_age_group1_idx')
                ->references('id')->on('age_groups')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }


    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
