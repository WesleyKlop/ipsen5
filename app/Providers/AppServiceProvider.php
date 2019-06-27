<?php

namespace App\Providers;

use App\Eloquent\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->initializeSettings();
    }

    private function initializeSettings()
    {
        $settings = Setting
            ::all()
            ->keyBy('name');

        View::share('settings', $settings);
    }
}
