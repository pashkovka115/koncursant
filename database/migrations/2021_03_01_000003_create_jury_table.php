<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuryTable extends Migration
{
    public function up()
    {
        Schema::create('jury', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('active', ['1', '0']);
            $table->string('direction')->nullable()->comment('специальность в жюри');
            $table->string('profession')->nullable()->comment('имеет специальности');
            $table->string('img')->nullable();
            $table->text('description')->nullable()->comment('краткое описание');
            $table->longText('ducation')->nullable()->comment('образование');
            $table->longText('geography_of_work')->nullable()->comment('География трудовой деятельности');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('jury');
    }
}
