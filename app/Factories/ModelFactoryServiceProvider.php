<?php
namespace App\Factories;

use Dingo\Api\Provider\ServiceProvider;

class ModelFactoryServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    public function register()
    {
        return $this->app->bind(ModelFactory::class, EloquentModelFactory::class);
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            ModelFactory::class,
        ];
    }
}
