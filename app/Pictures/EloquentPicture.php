<?php
namespace App\Pictures;

use App\Articles\EloquentArticle;
use App\Models\StandardModel;
use Illuminate\Database\Eloquent\Model;

class EloquentPicture extends Model implements Picture
{
    use StandardModel;

    /**
     * @return \App\Articles\Article
     */
    public function article()
    {
        return $this->belongsTo(EloquentArticle::class, 'article_id', 'id')->first();
    }

    /**
     * @return string
     */
    public function path()
    {
        return $this->path;
    }
}
