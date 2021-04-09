<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class CompetitionSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $titles = [
            'РАДУГА ДЕТСТВА',
            'ГОЛОС РОССИИ',
            'ТИХАЯ МОЯ РОДИНА',
            'ПЕРВЫЕ ЛАСТОЧКИ',
        ];
        $competitions = [];

        for ($i = 1; $i <= 6; $i++) {
            $name = $titles[array_rand($titles)] . " $i";
            $competitions[] = [
                'name' => $name,
                'slug' => \Str::slug($name),
                'competition_type_id' => ($i % 2 == 0) ? 2 : 1,
                'description' => $faker->paragraph(5),
                'date_start' => '20.06.2021',
                'date_end' => '26.06.2021',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        \DB::table('competitions')->insert($competitions);
    }
}
