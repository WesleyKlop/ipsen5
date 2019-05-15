<?php

namespace App\Providers;

use App\Eloquent\Candidate;
use App\Guard\JwtGuard;
use Firebase\JWT\JWT;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::viaRequest('jwt', function (Request $request) {
            $token = $request->bearerToken();
            if (is_null($token)) {
                return null;
            }
            $userId = JWT::decode($token, env('APP_KEY'), ['HS256'])
                ->sub
                ->user_id;
            return Candidate::where('user_id', $userId)->first();
        });
    }
}
