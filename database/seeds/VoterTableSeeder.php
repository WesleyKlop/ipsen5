<?php

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
        $voters = factory(App\Voter::class, 25)->make();
    }
}
