<?php

namespace App\Providers;

use App\Announcements\AnnouncementRouteBinding;
use App\Articles\ArticleRouteBinding;
use App\Contacts\ContactRouteBinding;
use App\Faqs\FaqRouteBinding;
use App\Pictures\PictureRouteBinding;
use App\Riders\RiderRouteBinding;
use App\Rosters\RosterRouteBinding;
use App\Subscriptions\SubscriptionRouteBinding;
use App\Users\UserRouteBinding;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::bind('announcement', AnnouncementRouteBinding::class);
        Route::bind('article', ArticleRouteBinding::class);
        Route::bind('faq', FaqRouteBinding::class);
        Route::bind('form_entry', ContactRouteBinding::class);
        Route::bind('picture', PictureRouteBinding::class);
        Route::bind('rider', RiderRouteBinding::class);
        Route::bind('roster', RosterRouteBinding::class);
        Route::bind('subscription', SubscriptionRouteBinding::class);
        Route::bind('user', UserRouteBinding::class);

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapApiRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace' => $this->namespace . '\Api',
            'prefix' => 'api',
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }
}
