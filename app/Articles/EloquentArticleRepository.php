<?php
namespace App\Articles;

use App\Users\User;

class EloquentArticleRepository implements ArticleRepository
{
    /**
     * @var \App\Articles\EloquentArticle
     */
    private $article;

    public function __construct(EloquentArticle $article)
    {
        $this->article = $article;
    }

    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllPaginated($limit = 20)
    {
        return $this->article
            ->latest()
            ->paginate($limit);
    }

    /**
     * @param \App\Users\User $user
     * @param array $values
     * @return \App\Articles\Article
     */
    public function create(User $user, array $values)
    {
        $article = new EloquentArticle();
        $article->message = $values['message'];
        $article->title = $values['title'];
        $article->user_id = $user->id();

        $article->save();

        return $article;
    }

    /**
     * @param \App\Articles\Article $article
     * @param array $values
     * @return \App\Articles\Article
     */
    public function update(Article $article, array $values)
    {
        $article->title = $values['title'];
        $article->message = $values['message'];
        
        $article->save();
        
        return $article;
    }

    /**
     * @param int $id
     * @return \App\Users\User|null
     */
    public function find($id)
    {
        return $this->article
            ->where('id', $id)
            ->first();
    }

    /**
     * @param \App\Articles\Article $article
     */
    public function delete(Article $article)
    {
        $article->delete();
    }
}
