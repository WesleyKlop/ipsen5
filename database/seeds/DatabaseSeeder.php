<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SurveyTableSeeder::class,
            AdminTableSeeder::class,
            CandidateTableSeeder::class,
            VoterTableSeeder::class,
        ]);
    }
}
