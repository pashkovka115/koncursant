<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->integer('thanks_teacher')->default(0)->comment('Благодарность педагогу');
            $table->integer('diploma')->default(0)->comment('стоимость индивидуального диплома для участника в любительском (электронный)');
            $table->integer('diploma_kollective_electro')->default(0)->comment('коллективный диплом в любительском конкурсе');
            $table->integer('diploma_print_solist')->default(0)->comment('стоимость печати сольного в профессиональном конкурсе');
            $table->integer('diploma_print_kollective')->default(0)->comment('стоимость печати индивидуального в коллективе');
            $table->integer('general_diplom_print')->default(0)->comment('Цена общего диплома в профессиональном коллективе');
            $table->integer('discount')->default(0)->comment('скидка на каждого последующего участника');
            $table->integer('cnt_person')->default(0)->comment('скидка начиная с этого участника');
            $table->integer('max_quantity_participants_price')->default(0)->comment('свыше этого количества участников бесплатно');
        });
    }


    public function down()
    {
        Schema::dropIfExists('prices');
    }
}

