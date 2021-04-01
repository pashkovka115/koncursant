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
                'type' => 'amateur'
            ],
            [
                'name' => 'Профессиональные',
                'slug' => \Str::slug('Профессиональные'),
                'type' => 'professional'
            ],
        ];

        \DB::table('competition_types')->insert($competition_types);
    }
}
