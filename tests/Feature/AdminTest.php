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
            'password' => 'TESTPWpleaseignore',
        ]);

        $this->assertEquals($user->id, $testadmin->user_id);

        //Cleanup
        $testadmin->delete();
        $user->delete();
    }
}
