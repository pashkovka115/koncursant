<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppraisalSeeder extends Seeder
{
    public function run()
    {
        $apps = [
            [
                'name' => 'Лауреат 1 степени'
            ],
            [
                'name' => 'Лауреат 2 степени'
            ],
            [
                'name' => 'Лауреат 3 степени'
            ],
            [
                'name' => 'Дипломант 1 степени'
            ],
            [
                'name' => 'Дипломант 2 степени'
            ],
            [
                'name' => 'Дипломант 3 степени'
            ],
        ];

        \DB::table('appraisals')->insert($apps);
    }
}
