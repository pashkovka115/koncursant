<?php

namespace Database\Seeders;

use App\Models\Bid;
use Illuminate\Database\Seeder;

class CompetitionUserSeeder extends Seeder
{
    public function run()
    {
        $bids_ids = array_keys(Bid::get('id')->keyBy('id')->toArray());

        for ($j = 0; $j < 5; $j++) {
            $users = [];
            for ($i = 0; $i < count($bids_ids); $i++) {
                $users[] = [
                    'bid_id' => $bids_ids[$i],
                    'first_name' => "Name 1 $j-$i",
                    'last_name' => "Name 2 $j-$i",
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            \DB::table('сompetition_users')->insert($users);
        }
    }
}
