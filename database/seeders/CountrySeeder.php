<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run()
    {
        $countries = [
            [
                'name' => 'Россия - 0',
                'postage_price' => 0
            ],
            [
                'name' => 'Казахстан - 300',
                'postage_price' => 300
            ],
            [
                'name' => 'Зарумбия - 500',
                'postage_price' => 500
            ],
        ];

        \DB::table('countries')->insert($countries);
    }
}
