<?php

namespace App\Providers;

use App\Eloquent\AppUser;
use App\Eloquent\Candidate;
use App\Eloquent\Voter;
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
            $bearer = $request->bearerToken();
            if (is_null($bearer)) {
                return null;
            }
            $token = JWT::decode($bearer, env('APP_KEY'), ['HS256']);
            return $this->getVoterOrCandidate($token->sub);
        });
    }

    private function getVoterOrCandidate(\stdClass $sub): ?AppUser
    {
        switch ($sub->type) {
            case 'voter':
                return Voter::where('user_id', $sub->uid)->first();
            case 'candidate':
                return Candidate::where('user_id', $sub->uid)->first();
        }
    }
}
