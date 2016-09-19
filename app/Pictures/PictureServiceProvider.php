<?php
namespace App\Pictures;

use Illuminate\Support\ServiceProvider;

class PictureServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;
    
    public function register()
    {
        $this->app->singleton(PictureRepository::class, function() {
            return new EloquentPictureRepository(new EloquentPicture());
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            PictureRepository::class,
        ];
    }
}
