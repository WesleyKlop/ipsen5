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

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::create([
            'id' => Str::uuid(),
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

    public function tearDown(): void
    {
        //Cleanup from database
        Admin::all()->last()->delete();
        User::all()->last()->delete();

        parent::tearDown();
    }
}
