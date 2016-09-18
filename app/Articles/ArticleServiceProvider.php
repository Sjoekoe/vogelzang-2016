<?php
namespace App\Articles;

use Illuminate\Support\ServiceProvider;

class ArticleServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;
    
    public function register()
    {
        $this->app->singleton(ArticleRepository::class, function() {
            return new EloquentArticleRepository(new EloquentArticle());
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            ArticleRepository::class,
        ];
    }
}
