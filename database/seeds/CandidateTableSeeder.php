<?php

use App\Eloquent\Candidate;
use App\Eloquent\Profile;
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
        factory(Candidate::class, 10)->create()->each(function (Candidate $candidate) {
            $candidate->profile()->save(factory(Profile::class)->make());
        });
    }
}
