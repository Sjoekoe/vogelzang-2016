<?php
namespace App\Announcements;

use Dingo\Api\Provider\ServiceProvider;

class AnnouncementServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(AnnouncementRepository::class, function() {
            return new EloquentAnnouncementRepository(new EloquentAnnouncement());
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            AnnouncementRepository::class,
        ];
    }
}
