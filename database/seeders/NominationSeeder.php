<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NominationSeeder extends Seeder
{
    public function run()
    {
        $nominations = [
            [
                'name' => 'Спой-ка!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Потанцуй-ка!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Почитай-ка!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Сыграй-ка!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Пройдись-ка!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Нарисуй-ка!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Сделай-ка!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        \DB::table('nominations')->insert($nominations);
    }
}
