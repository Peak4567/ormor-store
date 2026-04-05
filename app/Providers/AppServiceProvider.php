<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Backend\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        if (Schema::hasTable('settings')) {

            $website_settings = Setting::first() ?? new Setting();

            View::share('web_cfg', $website_settings);
        }
    }
}