<?php

use App\Eloquent\Voter;
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
        $voters = factory(Voter::class, 25)->create();

    }
}
