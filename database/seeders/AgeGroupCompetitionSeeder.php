<?php

namespace Database\Seeders;

use App\Models\Competition;
use Illuminate\Database\Seeder;

class AgeGroupCompetitionSeeder extends Seeder
{
    public function run()
    {
        $com_ids = array_keys(Competition::all('id')->keyBy('id')->toArray());

        $age_group_competition = [];
        $i = 1;
        foreach ($com_ids as $com_id){
            $age_group_competition[] = [
                'competition_id' => $com_id,
                'age_group_id' => ($i % 2 == 0) ? 2 : 1
            ];
            $i++;
        }

        \DB::table('age_group_competition')->insert($age_group_competition);
    }
}
