<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
        return view('login');
    }

    public function username()
    {
        return 'username';
    }

//    public function doLogin(Request $request) {
//        $credentials = $request->only('username', 'password');
//        dd($credentials);
//    }
}
