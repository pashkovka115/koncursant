<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AgeGroupSeeder extends Seeder
{
    public function run()
    {
        $groups = [
            [
                'name' => 'Младшая (дошкольники)',
                'slug' => \Str::slug('Младшая (дошкольники)'),
                'age' => 'От 5 до 10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Старшая (школьники)',
                'slug' => \Str::slug('Старшая (школьники)'),
                'age' => 'От 5 до 10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Взрослая (от 18 и старше)',
                'slug' => \Str::slug('Взрослая (от 18 и старше)'),
                'age' => 'От 5 до 10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Смешанная',
                'slug' => \Str::slug('Смешанная'),
                'age' => 'От 5 до 10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        \DB::table('age_groups')->insert($groups);
    }
}
