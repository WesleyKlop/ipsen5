<?php

use Illuminate\Database\Seeder;

class CandidateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $candidates = factory(App\Candidate::class, 10)->make();
        $surveys = \App\Survey::all()->pluck('id');
        DB::table('users')->insert($candidates->map(function (\App\Candidate $candidate) {
            return ['id' => $candidate->id];
        })->toArray());
        DB::table('profile')->insert($candidates->map(function (\App\Candidate $candidate) {
            return [
                'user_id' => $candidate->id,
                'name' => $candidate->name,
                'bio' => $candidate->bio,
            ];
        })->toArray());
        DB::table('candidate')->insert($candidates->map(function (\App\Candidate $candidate) use ($surveys) {
            return [
                'url' => $candidate->url,
                'survey_id' => $surveys->random(),
                'user_id' => $candidate->id,
            ];
        })->toArray());
    }
}
