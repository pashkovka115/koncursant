<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class PageSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $pages = [];
        for ($i = 0; $i < 3; $i++) {
            $name = $faker->words(5, true);
            $pages[] = [
                'name' => $name,
                'slug' => \Str::slug($name),
                'content' => $faker->realText(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        \DB::table('pages')->insert($pages);
    }
}
