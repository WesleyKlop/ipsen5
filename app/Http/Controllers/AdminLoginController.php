<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/';

    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function username()
    {
        return 'username';
    }

    public function loggedOut(Request $request)
    {
        return redirect('/admin/login');
    }
}
