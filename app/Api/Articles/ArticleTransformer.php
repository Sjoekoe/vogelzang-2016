<?php
namespace App\Api\Articles;

use App\Api\Users\UserTransformer;
use App\Articles\Article;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $defaultIncludes = ['userRelation'];

    /**
     * @param \App\Articles\Article $article
     * @return array
     */
    public function transform(Article $article)
    {
        return [
            'id' => $article->id(),
            'title' => $article->title(),
            'message' => $article->message(),
            'created_at' => $article->createdAt()->toIso8601String(),
        ];
    }

    /**
     * @param \App\Articles\Article $article
     * @return \League\Fractal\Resource\Item
     */
    public function includeUserRelation(Article $article)
    {
        return $this->item($article->author(), new UserTransformer());
    }
}
