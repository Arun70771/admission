<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define the routes for the application.
     */
    public function boot()
    {

        logger()->info('RouteServiceProvider boot method executed.');

        
        $this->configureRateLimiting();
    
        $this->routes(function () {
            // Web routes
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
    
            // Admin routes
            Route::prefix('admin')
                ->middleware('web')
                ->group(base_path('routes/admin.php'));
    
            // Log a message to confirm the admin routes are being loaded
            \Log::info('Admin routes loaded');
        });
    }
}
