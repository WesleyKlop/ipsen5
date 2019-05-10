<?php

use App\Admin;
use App\Survey;
use App\Voter;
use Illuminate\Database\Seeder;

class VoterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $surveys = Survey::all();
        $admins = Admin::all();
        $voters = factory(Voter::class, 25)->make();
        $faker = \Faker\Factory::create();

        DB::table('users')->insert($voters->map(function (Voter $voter) {
            return [
                'id' => $voter->id,
            ];
        })->toArray());
        DB::table('survey_code')->insert($voters->map(function (Voter $voter) use ($faker, $admins, $surveys) {
            $admin = $admins->random();
            $survey = $surveys->random();
            return [
                'code' => $voter->code,
                'username' => $admin->username,
                'user_id' => $admin->id,
                'survey_id' => $survey->id,
                'expire' => $faker->dateTimeBetween('now', '+2 weeks'),
            ];
        })->toArray());
        DB::table('voter')->insert($voters->map(function (Voter $voter) {
            return [
                'code' => $voter->code,
                'user_id' => $voter->id,
            ];
        })->toArray());
    }
}
