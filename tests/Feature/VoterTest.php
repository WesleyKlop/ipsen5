<?php
//
//namespace Tests\Feature;
//
//use App\Eloquent\Admin;
//use App\Eloquent\Proposition;
//use App\Eloquent\Survey;
//use App\Eloquent\SurveyCode;
//use App\Eloquent\User;
//use App\Eloquent\Voter;
//use Carbon\Carbon;
//use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Support\Str;
//use Tests\TestCase;
//
///*
// * Things a voter should be able to do:
// *
// * Join a survey
// * Get propositions
// * Submit proposition answers
// * Submit feedback
// * Get matched with a candidate
// */
//class VoterTest extends TestCase
//{
//    //This trait makes sure the database remains unaffected by the tests.
//    use DatabaseTransactions;
//
//    protected $survey;
//    protected $surveycode;
//    protected $user;
//    protected $teacher;
//    protected $propositions;
//
//    public function setUp(): void
//    {
//        parent::setUp();
//
//        $this->user = User::create([
//            'id' => Str::uuid(),
//        ]);
//
//        $this->teacher = Admin::create([
//            'user_id' => $this->user->id,
//            'type' => 'teacher',
//            'username' => 'admin@UnitTests.com',
//            'password' => 'testpassword',
//        ]);
//
//        $this->survey = Survey::create([
//            'id' => Str::uuid(),
//            'name' => 'VoterTest Survey',
//        ]);
//
//        $this->surveycode = SurveyCode::create([
//
//            //Technically not perfect since it is possible that
//            //it randomly generates an already existing code.
//            //The chance is astronomically small though.
//            'code' => mt_rand(100000, 999999),
//            'user_id' => $this->teacher->user_id,
//            'survey_id' => $this->survey->id,
//            'expire' => Carbon::now()->addMonth()->timestamp,
//            'started_at' => Carbon::now()->timestamp,
//        ]);
//
//        $this->propositions = [
//            Proposition::create([
//                'id' => Str::uuid(),
//                'survey_id' => $this->survey->id,
//                'proposition' => 'This is the first proposition',
//            ]),
//            Proposition::create([
//                'id' => Str::uuid(),
//                'survey_id' => $this->survey->id,
//                'proposition' => 'This is the second proposition',
//            ]),
//            Proposition::create([
//                'id' => Str::uuid(),
//                'survey_id' => $this->survey->id,
//                'proposition' => 'This is the third proposition',
//            ])
//        ];
//    }
//
//    public function testThatAVoterCanJoinASurvey()
//    {
//        //The response to the request that is submitted when the voter submits the code.
//        $response = $this->withHeaders([
//            'Accept' => 'application/json',
//            'Content-Type' => 'application/json',
//        ])->json(
//            'POST',
//            'http://localhost:8000/api/voter/login',
//            ['code' => $this->surveycode->code]
//        );
//
//        $response->assertStatus(200);
//
//        $this->assertDatabaseHas('voters', ['code' => $this->surveycode->code]);
//    }
//
//    /* Testing that a voter is linked to propositions by requesting them via
//     * the user id. This shows there is a connection between the voter and
//     * the propositions, allowing us to view them on the voter screen.
//     * To test that a voter can view the propositions we will perform usability tests.
//     */
//    public function testThatAVoterIsLinkedToPropositions()
//    {
//        $voter = Voter::create([
//            'code' => $this->surveycode->code,
//            'user_id' => $this->user->id,
//        ]);
//
//        $this->assertEquals(
//            'This is the second proposition',
//            Proposition::where(
//                'survey_id',
//                SurveyCode::where('code', $voter->code)
//                    ->first()->survey_id
//            )
//            ->where('proposition', 'This is the second proposition')
//            ->first()
//            ->proposition
//        );
//    }
//}
