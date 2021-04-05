<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompetitionTeacherSeeder extends Seeder
{
    public function run()
    {
        $teachers = [];
        for ($i = 0; $i < 5; $i++) {
            $teachers[] = [
                'bid_id' => ($i % 2 == 0) ? 1 : 2,
                'first_name' => 'Name 1',
                'last_name' => 'Name 2',
                'third_name' => 'Name 3',
                'job' => 'Job',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        \DB::table('сompetition_teachers')->insert($teachers);
    }
}
