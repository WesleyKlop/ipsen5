<?php

namespace Tests\Feature;

use App\Eloquent\Admin;
use App\Eloquent\User;
use Tests\TestCase;
use Illuminate\Support\Str;

class AdminTest extends TestCase
{

    protected $user;
    protected $admin;
    protected $id;

    public function setUp(): void
    {
        $this->id = Str::uuid();

        parent::setUp();
        $this->user = User::create([
            'id' => $this->id,
        ]);

        $this->admin = Admin::create([
            'user_id' => $this->user->id,
            'type' => 'teacher',
            'username' => 'admin@UnitTests.com',
            'password' => 'testpassword',
        ]);
    }

    //Admin creation technically happens in the setUp, so here it is checked that was actually created
    public function testThatAnAdminCanBeCreated()
    {
        $this->assertEquals($this->user->id, Admin::all()->last()['user_id']);
        $this->assertEquals('teacher', Admin::all()->last()['type']);
        $this->assertEquals('admin@UnitTests.com', Admin::all()->last()['username']);
        $this->assertEquals('testpassword', Admin::all()->last()['password']);
    }

    public function testThatATrialCanBeAssigned()
    {
        $this->admin->addToTrial();
        $this->assertTrue($this->admin->isInTrial());
        $this->admin->removeFromTrial();
    }

    public function tearDown(): void
    {
        //Cleanup from database
        Admin::all()->where('user_id', '=', $this->id)->first()->delete();
        User::all()->where('id', '=', $this->id)->first()->delete();

        parent::tearDown();
    }
}
