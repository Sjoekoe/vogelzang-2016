<?php
namespace App\Contacts;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;
    
    public function register()
    {
        $this->app->singleton(ContactRepository::class, function() {
            return new EloquentContactRepository(new EloquentContact());
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            ContactRepository::class,
        ];
    }
}
