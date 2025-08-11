<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
   public function boot(): void
{
    $port = request()->getPort();

    // Port එකට අනුව system එකට usertype එක assign කරනවා
    if ($port == 8000) {
        Config::set('app.role', 'user');
    } elseif ($port == 8001) {
        Config::set('app.role', 'admin');
    } elseif ($port == 8002) {
        Config::set('app.role', 'manager');
    }
}
}
