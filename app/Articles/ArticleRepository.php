<?php
namespace App\Articles;

use App\Users\User;

interface ArticleRepository
{
    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllPaginated($limit = 20);

    /**
     * @param \App\Users\User $user
     * @param array $values
     * @return \App\Articles\Article
     */
    public function create(User $user, array $values);

    /**
     * @param \App\Articles\Article $article
     * @param array $values
     * @return \App\Articles\Article
     */
    public function update(Article $article, array $values);

    /**
     * @param int $id
     * @return \App\Users\User|null
     */
    public function find($id);

    /**
     * @param \App\Articles\Article $article
     */
    public function delete(Article $article);
}
