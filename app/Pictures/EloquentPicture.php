<?php
namespace App\Pictures;

use App\Articles\EloquentArticle;
use App\Models\StandardModel;
use Illuminate\Database\Eloquent\Model;

class EloquentPicture extends Model implements Picture
{
    use StandardModel;

    /**
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function articleRelation()
    {
        return $this->belongsTo(EloquentArticle::class, 'item_id', 'id');
    }

    /**
     * @return \App\Articles\Article
     */
    public function article()
    {
        return $this->articleRelation()->first();
    }

    /**
     * @return string
     */
    public function path()
    {
        return $this->path;
    }
}
