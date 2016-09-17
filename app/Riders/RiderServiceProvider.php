<?php
namespace App\Riders;

use Illuminate\Support\ServiceProvider;

class RiderServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;
    
    public function register()
    {
        $this->app->singleton(RiderRepository::class, function() {
            return new EloquentRiderRepository(new EloquentRider());
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            RiderRepository::class,
        ];
    }
}
