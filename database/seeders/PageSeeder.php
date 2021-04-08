<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class PageSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $pages = [
            [
                'name' => 'Принять участие',
                'slug' => \Str::slug('Принять участие'),
                'content' => $faker->realText(2000),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Как подать заявку',
                'slug' => \Str::slug('Как подать заявку'),
                'content' => $faker->realText(2000),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];


        \DB::table('pages')->insert($pages);
    }
}
