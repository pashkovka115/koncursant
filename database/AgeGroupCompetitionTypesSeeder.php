<?php

namespace Database\Seeders;

use App\Models\AgeGroup;
use App\Models\CompetitionType;
use Illuminate\Database\Seeder;

class AgeGroupCompetitionTypesSeeder extends Seeder
{
    public function run()
    {
        $pivot = [];

        $age_ids = array_keys(AgeGroup::all('id')->keyBy('id')->toArray());

        foreach ($age_ids as $age_id){
            $pivot[] = [
                'age_group_id' => $age_id,
                'competition_type_id' => 1
            ];
        }

        foreach ($age_ids as $age_id){
            $pivot[] = [
                'age_group_id' => $age_id,
                'competition_type_id' => 2
            ];
        }

        \DB::table('age_group_competition_type')->insert($pivot);
    }
}
