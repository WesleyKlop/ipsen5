<?php

namespace App\Http\Controllers;

use App\Eloquent\Admin;
use App\Eloquent\User;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminRegisterController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/';

    use RegistersUsers;

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * @param array $data
     * @return mixed
     * @throws Exception
     */
    protected function create(array $data)
    {
        $user = User::create([
            'id' => Str::uuid(),
        ]);

        return Admin::create([
            'user_id' => $user->id,
            'type' => 'teacher',
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * @inheritDoc
     */
    protected function registered(Request $request, Admin $user)
    {
        $user->addToTrial();
    }
}
