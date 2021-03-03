<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompetitionTypeSeeder extends Seeder
{
    public function run()
    {
        $competition_types = [
            [
                'name' => 'Бесплатные',
                'slug' => \Str::slug('Бесплатные'),
            ],
            [
                'name' => 'Профессиональные',
                'slug' => \Str::slug('Профессиональные'),
            ],
        ];

        \DB::table('competition_types')->insert($competition_types);
    }
}
