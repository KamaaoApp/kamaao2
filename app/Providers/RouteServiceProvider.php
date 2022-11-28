<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';
    
    /** @var string $apiNamespace */
    protected $apiNamespace ='App\Http\Controllers\Api';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();
        $this->mapApiRoutes();

        $this->routes(function () {
            Route::prefix('api/v1')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));
            Route::prefix('api/w1')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/web_api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }

    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => ['api', 'api_version:v1'],
            'namespace'  => "{$this->apiNamespace}",
            'prefix'     => 'api/v1',
        ], function ($router) {
            require base_path('routes/api.php');
        });    
        Route::group([
            'middleware' => ['api', 'api_version:w2'],
            'namespace'  => "{$this->apiNamespace}\Web",
            'prefix'     => 'api/v2',
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }
}
