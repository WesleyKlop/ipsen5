<?php

namespace Tests\Feature;

use App\Eloquent\Admin;
use App\Eloquent\Trial;
use App\Eloquent\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Str;
use Tests\TestCase;

/*
 * Things an admin should be able to do:
 *
 * Log in
 * Create Surveys
 * Delete Surveys
 * Create Propositions
 * Remove Propositions
 * Invite Candidates
 * Invite Teachers
 * Log out
 */
class AdminTest extends TestCase
{
    //This trait makes sure the database remains unaffected by the tests.
    use DatabaseTransactions;

    protected $user;
    protected $admin;
    protected $id;
    protected $testvalues;

    public function setUp(): void
    {
        parent::setUp();

        $this->id = Str::uuid();
        $this->user = User::create([
            'id' => $this->id,
        ]);

        $this->testvalues = [
            'user_id' => $this->user->id,
            'type' => 'teacher',
            'username' => 'admin@UnitTests.com',
            'password' => 'testpassword',
        ];

        $this->admin = Admin::create($this->testvalues);
    }

    //Admin creation technically happens in the setUp, so here it is checked that was actually created
    public function testThatAnAdminCanBeCreated()
    {
        $this->assertDatabaseHas('admins', $this->testvalues);
    }

    public function testThatATrialCanBeAssigned()
    {
        $this->admin->addToTrial();
        $this->assertTrue($this->admin->isInTrial());
        $this->assertEquals($this->user->id, Trial::find($this->user->id)['teacher_id']);
        $this->admin->removeFromTrial();
        $this->assertNotTrue($this->admin->isInTrial());
    }
}
