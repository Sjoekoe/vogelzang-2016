<?php
namespace App\Api\Pictures;

use App\Api\Articles\ArticleTransformer;
use App\Pictures\Picture;
use League\Fractal\TransformerAbstract;

class PictureTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $defaultIncludes = ['articleRelation'];

    /**
     * @param \App\Pictures\Picture $picture
     * @return array
     */
    public function transform(Picture $picture)
    {
        return [
            'id' => $picture->id(),
            'path' => $picture->path(),
        ];
    }

    /**
     * @param \App\Pictures\Picture $picture
     * @return \League\Fractal\Resource\Item
     */
    public function includeArticleRelation(Picture $picture)
    {
        return $this->item($picture->article(), new ArticleTransformer());
    }
}
