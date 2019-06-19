<?php

namespace Tests\Feature;

use App\Eloquent\Admin;
use App\Eloquent\Proposition;
use App\Eloquent\Survey;
use App\Eloquent\SurveyCode;
use App\Eloquent\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Str;
use Tests\TestCase;

/*
 * Things a voter should be able to do:
 *
 * Join a survey
 * Get propositions
 * Submit proposition answers
 * See Feedback after the last proposition
 * Get matched with a politician
 *
 */
class VoterTest extends TestCase
{
    //This trait makes sure the database remains unaffected by the tests.
    use DatabaseTransactions;

    protected $survey;
    protected $user;
    protected $teacher;
    protected $propositions;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'id' => Str::uuid(),
        ]);

        $this->teacher = Admin::create([
            'user_id' => $this->user->id,
            'type' => 'teacher',
            'username' => 'admin@UnitTests.com',
            'password' => 'testpassword',
        ]);

        $this->survey = Survey::create([
            'id' => Str::uuid(),
            'name' => 'VoterTest Survey',
        ]);

        $this->propositions = [
            Proposition::create([
                'id' => Str::uuid(),
                'survey_id' => $this->survey->id,
                'proposition' => 'This is the first proposition',
            ]),
            Proposition::create([
                'id' => Str::uuid(),
                'survey_id' => $this->survey->id,
                'proposition' => 'This is the second proposition',
            ]),
            Proposition::create([
                'id' => Str::uuid(),
                'survey_id' => $this->survey->id,
                'proposition' => 'This is the third proposition',
            ])
        ];
    }

    public function testThatAUserCanJoinASurvey()
    {
        $surveycode = SurveyCode::create([
            'code' => '000000',
            'user_id' => $this->teacher->user_id,
            'survey_id' => $this->survey->id,
            'expire' => Carbon::now()->addMonth()->timestamp,
            'started_at' => Carbon::now()->timestamp,
        ]);

        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->json('POST', 'http://localhost:8000/api/voter/login', ['code' => $surveycode->code]);

        $response->assertStatus(200);
    }

//    public function testThatAVoterCanReceivePropositions(){
//
//    }
}
