<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\RegistersUsers;

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
}
