<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    public function run()
    {
        $price = [
            // Благодарность педагогу
            'thanks_teacher' => 90,

            // стоимость индивидуального диплома для участника в любительском (электронный)
            'diploma' => 70,

            // коллективный диплом в любительском конкурсе
            'diploma_kollective_electro' => 0,

            // стоимость печати сольного/индивидуального/индивидуальный в СОЛИСТЕ
            // диплома за штуку в профессиональном конкурсе (на бумаге)
            'diploma_print_solist' => 200,

            // стоимость печати сольного/индивидуального/индивидуальный в КОЛЛЕКТИВЕ
            // диплома за штуку в профессиональном конкурсе (на бумаге)
            'diploma_print_kollective' => 200,

            // Цена общего диплома в профессиональном коллективе
            'general_diplom_print' => 200,

            // скидка на каждого последующего участника
            'discount' => 400,
            // скидка начиная с этого участника
            'cnt_person' => 2,
            // свыше этого количества участников бесплатно
            'max_quantity_participants_price' => 5,
        ];

        \DB::table('prices')->insert($price);
    }
}
