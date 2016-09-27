<?php
namespace App\Announcements;

use App\Users\EloquentUser;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EloquentAnnouncement extends Model implements Announcement
{
    /**
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function body()
    {
        return $this->body;
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
    public function user()
    {
        return $this->belongsTo(EloquentUser::class, 'user_id', 'id')->first();
    }

    /**
     * @return bool
     */
    public function visible()
    {
        return $this->visible;
    }

    /**
     * @return \Carbon\Carbon
     */
    public function createdAt()
    {
        return Carbon::parse($this->created_at);
    }

    /**
     * @return \Carbon\Carbon
     */
    public function updatedAt()
    {
        return Carbon::parse($this->updated_at);
    }
}
