<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\BusinessDay;
use App\Observers\BusinessDayObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        BusinessDay::observe(BusinessDayObserver::class);
    }
}
