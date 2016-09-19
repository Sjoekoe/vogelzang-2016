<?php
namespace App\Pictures;

use App\Articles\Article;

class EloquentPictureRepository implements PictureRepository
{
    /**
     * @var \App\Pictures\EloquentPicture
     */
    private $picture;

    public function __construct(EloquentPicture $picture)
    {
        $this->picture = $picture;
    }

    /**
     * @param \App\Articles\Article $article
     * @return \App\Pictures\Picture[]
     */
    public function findAllForArticle(Article $article)
    {
        return $this->picture
            ->where('item_id', $article->id())
            ->get();
    }

    /**
     * @param \App\Articles\Article $article
     * @param array $values
     * @return \App\Pictures\Picture
     */
    public function create(Article $article, array $values)
    {
        $picture = new EloquentPicture();
        $picture->path = $values['path'];
        $picture->item_id = $article->id();

        $picture->save();

        return $picture;
    }

    /**
     * @param int $id
     * @return \App\Pictures\Picture|null
     */
    public function find($id)
    {
        return $this->picture
            ->where('id', $id)
            ->first();
    }

    /**
     * @param \App\Pictures\Picture $picture
     */
    public function delete(Picture $picture)
    {
        $picture->delete();
    }
}
