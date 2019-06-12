<?php

namespace Tests\Feature;

use App\Eloquent\Admin;
use App\Eloquent\User;
use Tests\TestCase;
use Illuminate\Support\Str;

class AdminTest extends TestCase
{

    public function testThatAnAdminCanBeCreated()
    {
        $user = User::create([
            'id' => Str::uuid(),
        ]);

        $testadmin = Admin::create([
            'user_id' => $user->id,
            'type' => 'teacher',
            'username' => 'admin@UnitTests.com',
            'password' => 'testpassword',
        ]);

        //Retrieve the last entry from the list of all admins
        $this->assertEquals($user->id, Admin::all()->last()['user_id']);
        $this->assertEquals('teacher', Admin::all()->last()['type']);
        $this->assertEquals('admin@UnitTests.com', Admin::all()->last()['username']);
        $this->assertEquals('testpassword', Admin::all()->last()['password']);

        //Cleanup from database
        $testadmin->delete();
        $user->delete();
    }
}
