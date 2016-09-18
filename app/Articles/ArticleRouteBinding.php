<?php
namespace App\Articles;

use App\Http\AbstractRouteBinding;
use App\Http\Routebinding;

class ArticleRouteBinding extends AbstractRouteBinding implements Routebinding
{
    /**
     * @var \App\Articles\ArticleRepository
     */
    private $articles;

    public function __construct(ArticleRepository $articles)
    {
        $this->articles = $articles;
    }

    /**
     * @param int|string $value
     * @return \App\Users\User|null
     */
    public function find($value)
    {
        return $this->articles->find($value);
    }
}
