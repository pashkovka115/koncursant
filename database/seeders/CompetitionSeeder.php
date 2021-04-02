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

        for ($i = 1; $i <= 10; $i++) {
            $name = $titles[array_rand($titles)] . " $i";
            $competitions[] = [
                'name' => $name,
                'slug' => \Str::slug($name),
                'competition_type_id' => random_int(1, 2),
                'description' => $faker->paragraph(5),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        \DB::table('competitions')->insert($competitions);
    }
}
