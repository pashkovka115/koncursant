<?php

namespace Database\Seeders;

use App\Models\Competition;
use Illuminate\Database\Seeder;

class CompetitionTypeCompetitionSeeder extends Seeder
{
    public function run()
    {
        $cnt = Competition::count();
        $items = [];
        for ($i = 1; $i <= $cnt; $i++) {
            $items[] = [
                'competition_type_id' => ($i % 2 == 0) ? 2 : 1,
                'competition_id' => $i,
            ];
        }

        \DB::table('competition_competition_type')->insert($items);
    }
}
