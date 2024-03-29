<?php

namespace Database\Seeders;

use App\Models\CompetitionTeacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(JuryTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(CompetitionTypeSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(CompetitionSeeder::class);
//        $this->call(CompetitionTypeCompetitionSeeder::class);
        $this->call(AgeGroupSeeder::class);
        $this->call(AgeGroupCompetitionSeeder::class);
        $this->call(AppraisalSeeder::class);
        $this->call(BidSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(NominationSeeder::class);
        $this->call(TariffSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CompetitionTeacherSeeder::class);
        $this->call(CompetitionUserSeeder::class);
        $this->call(PriceSeeder::class);
    }
}
