<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AgeGroupSeeder extends Seeder
{
    public function run()
    {
        $groups = [
            [
                'name' => 'Младшая 750 и скидка',
                'slug' => \Str::slug('Младшая 750 и скидка'),
                'age' => 'От 5 до 10',
                'price' => 750,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Средняя - 950 и скидка',
                'slug' => \Str::slug('Средняя - 950 и скидка'),
                'age' => 'От 5 до 10',
                'price' => 950,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Старшая - 950 и скидка',
                'slug' => \Str::slug('Старшая - 950 и скидка'),
                'age' => 'От 5 до 10',
                'price' => 950,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        \DB::table('age_groups')->insert($groups);
    }
}
