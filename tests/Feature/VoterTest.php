<?php

namespace Tests\Feature;

use App\Eloquent\Admin;
use App\Eloquent\User;
use App\Eloquent\Survey;
use App\Eloquent\SurveyCode;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

/*
 * Things a voter should be able to do:
 *
 * Join a survey
 * Get propositions
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

    }

    public function testThatAUserCanJoinASurvey()
    {
        $survey = Survey::create([
            'id' => Str::uuid(),
            'name' => 'VoterTest Survey',
        ]);

        $surveycode = SurveyCode::create([
            'code' => Uuid::uuid4(),
            'user_id' => $this->teacher->user_id,
            'survey_id' => $survey->id,
            'expire' => Carbon::now()->addMonth(),
        ]);

        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->json('POST', 'http://localhost:8000/api/voter/login', ['code' => $surveycode->code]);

        $response->assertStatus(200);
    }
}
