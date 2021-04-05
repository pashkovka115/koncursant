<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompetitionUserSeeder extends Seeder
{
    public function run()
    {
        $users = [];
        for ($i = 0; $i < 5; $i++) {
            $users[] = [
                'bid_id' => ($i % 2 == 0) ? 1 : 2,
                'first_name' => 'Name 1',
                'last_name' => 'Name 2',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        \DB::table('сompetition_users')->insert($users);
    }
}
