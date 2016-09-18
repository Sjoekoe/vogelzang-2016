<?php
namespace App\Articles;

use App\Models\StandardModel;
use App\Pictures\EloquentPicture;
use App\Users\EloquentUser;
use Illuminate\Database\Eloquent\Model;

class EloquentArticle extends Model implements Article
{
    use StandardModel;

    /**
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function message()
    {
        return $this->message;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userRelation()
    {
        return $this->belongsTo(EloquentUser::class, 'user_id', 'id');
    }

    /**
     * @return \App\Users\User
     */
    public function author()
    {
        return $this->userRelation()->first();
    }

    /**
     * @return \App\Pictures\Picture[]
     */
    public function pictures()
    {
        return $this->hasMany(EloquentPicture::class, 'article_id', 'id')->get();
    }
}
