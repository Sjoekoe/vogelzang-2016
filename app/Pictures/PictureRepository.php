<?php
namespace App\Pictures;

use App\Articles\Article;

interface PictureRepository
{
    /**
     * @param \App\Articles\Article $article
     * @return \App\Pictures\Picture[]
     */
    public function findAllForArticle(Article $article);

    /**
     * @param \App\Articles\Article $article
     * @param array $values
     * @return \App\Pictures\Picture
     */
    public function create(Article $article, array $values);

    /**
     * @param int $id
     * @return \App\Pictures\Picture|null
     */
    public function find($id);

    /**
     * @param \App\Pictures\Picture $picture
     */
    public function delete(Picture $picture);
}
