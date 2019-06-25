<?php

namespace Tests\Feature;

use App\Eloquent\Admin;
use App\Eloquent\Candidate;
use App\Eloquent\Survey;
use App\Eloquent\SurveyCode;
use App\Eloquent\Voter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SurveyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var Candidate
     */
    protected $candidate;
    /**
     * @var Survey
     */
    protected $survey;
    /**
     * @var Voter
     */
    protected $voter;
    /**
     * @var Admin
     */
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = factory(Admin::class)->create();
        $this->survey = factory(Survey::class)->create();
        $this->candidate = factory(Candidate::class)->create();
        $this->surveyCode = factory(SurveyCode::class)->create();
        $this->voter = factory(Voter::class)->create();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCandidateHasCorrectSurvey()
    {
        $response = $this
            ->actingAs($this->candidate, 'api')
            ->getJson('/api/survey');

        $response
            ->assertStatus(200)
            ->assertJson([
                'id' => $this->survey->id,
            ]);
    }

    public function testVoterHasCorrectSurvey()
    {
        $response = $this
            ->actingAs($this->voter, 'api')
            ->getJson('/api/survey');

        $response
            ->assertStatus(200)
            ->assertJson([
                'id' => $this->survey->id,
            ]);
    }

    public function testSurveyAuthorization()
    {
        $response = $this
            ->getJson('/api/survey');

        $response->assertUnauthorized();
    }

    public function testSurveyHasCode() {
        $
    }
}
