<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TariffSeeder extends Seeder
{
    public function run()
    {
        $tariffs_solist = [
            [
                'name' => 'Выгодный',
                'type' => 'solist',
                'duration' => 30,
                'price' => 90,
            ],
            [
                'name' => 'Оптимальный',
                'type' => 'solist',
                'duration' => 15,
                'price' => 400,
            ],
            [
                'name' => 'Срочный',
                'type' => 'solist',
                'duration' => 3,
                'price' => 600,
            ],
            [
                'name' => 'Супер-срочный',
                'type' => 'solist',
                'duration' => 1,
                'price' => 1000,
            ],
        ];

        $tariffs_kollective = [
            [
                'name' => 'Выгодный 2',
                'type' => 'kollective',
                'duration' => 30,
                'price' => 190,
            ],
            [
                'name' => 'Оптимальный 2',
                'type' => 'kollective',
                'duration' => 15,
                'price' => 4100,
            ],
            [
                'name' => 'Срочный 2',
                'type' => 'kollective',
                'duration' => 3,
                'price' => 6100,
            ],
            [
                'name' => 'Супер-срочный 2',
                'type' => 'kollective',
                'duration' => 1,
                'price' => 10100,
            ],
        ];

        \DB::table('tariffs')->insert($tariffs_solist);
        \DB::table('tariffs')->insert($tariffs_kollective);
    }
}

