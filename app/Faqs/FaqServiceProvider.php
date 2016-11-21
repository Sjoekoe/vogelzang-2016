<?php
namespace App\Faqs;

use Illuminate\Support\ServiceProvider;

class FaqServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(FaqRepository::class, function () {
            return new EloquentFaqRepository(new EloquentFaq());
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            FaqRepository::class,
        ];
    }
}
