<?php
namespace App\Subscriptions;

use Dingo\Api\Provider\ServiceProvider;

class SubscriptionServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;
    
    public function register()
    {
        $this->app->singleton(SubscriptionRepository::class, function() {
            return new EloquentSubscriptionRepository(new EloquentSubscription());
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            SubscriptionRepository::class,
        ];
    }
}
