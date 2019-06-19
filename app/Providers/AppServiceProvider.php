<?php

namespace App\Providers;

use App\Eloquent\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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
        if (! Schema::hasTable('settings')) {
            return;
        }
        // Create settings if they don't exist.
        if (Setting::count() === 0) {
            Setting::create(['id' => Str::uuid(), 'name' => 'trial-survey']);
            Setting::create(['id' => Str::uuid(), 'name' => 'european-survey']);
            Setting::create(['id' => Str::uuid(), 'name' => 'country-survey']);
            Setting::create(['id' => Str::uuid(), 'name' => 'feedback-survey']);
        }

        $settings = Setting
            ::all()
            ->keyBy('name');

        View::share('settings', $settings);
    }
}
