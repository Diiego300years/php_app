<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Zarejestruj trasy aplikacji.
     *
     * @return void
     */
    public function boot()
    {
        $this->routes(function () {
            Route::prefix('api') // Ustawia prefiks 'api' dla tras z api.php
                ->middleware('api') // Stosuje middleware 'api'
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php')); // Ładuje plik routes/api.php

            Route::middleware('web') // Stosuje middleware 'web' dla tras z web.php
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }
}
