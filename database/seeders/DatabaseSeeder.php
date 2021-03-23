<?php

namespace Database\Seeders;

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
        $this->call(CompetitionTypeCompetitionSeeder::class);
        $this->call(AgeGroupSeeder::class);
        $this->call(AgeGroupCompetitionSeeder::class);
        $this->call(BidSeeder::class);
    }
}
