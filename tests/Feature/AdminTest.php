<?php

namespace Tests\Feature;

use App\Eloquent\Admin;
use App\Eloquent\User;
use App\Eloquent\Trial;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Support\Str;

class AdminTest extends TestCase
{
    //This trait makes sure the database remains unaffected by the tests.
    use DatabaseTransactions;

    protected $user;
    protected $admin;
    protected $id;

    public function setUp(): void
    {
        parent::setUp();

        $this->id = Str::uuid();
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
        $this->assertEquals($this->user->id, Admin::find($this->admin->user_id)['user_id']);
        $this->assertEquals('teacher', Admin::find($this->admin->user_id)['type']);
        $this->assertEquals('admin@UnitTests.com', Admin::find($this->admin->user_id)['username']);
        $this->assertEquals('testpassword', Admin::find($this->admin->user_id)['password']);
    }

//    public function testThatATrialCanBeAssigned()
//    {
//        $this->admin->addToTrial();
//        $this->assertTrue($this->admin->isInTrial());
////        var_dump(Trial::find($this->user->id)->first()->teacher_id);
////        $this->assertEquals($this->user->id, Trial::find($this->user->id)->first()->teacher_id);
//        $this->admin->removeFromTrial();
//    }
}
