<?php
namespace App\Rosters;

use App\Models\StandardModel;
use App\Subscriptions\EloquentSubscription;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EloquentRoster extends Model implements Roster
{
    use StandardModel;

    /**
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * @var array
     */
    protected $fillable = ['date', 'type', 'name', 'description', 'hour', 'limit'];

    /**
     * @return \Carbon\Carbon
     */
    public function date()
    {
        return Carbon::parse($this->date);
    }

    /**
     * @return int
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function description()
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function hour()
    {
        return $this->hour;
    }

    /**
     * @return int
     */
    public function limit()
    {
        return $this->limit;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptionRelation()
    {
        return $this->hasMany(EloquentSubscription::class, 'roster_id', 'id');
    }

    /**
     * @return \App\Subscriptions\Subscription[]
     */
    public function subscriptions()
    {
        return $this->subscriptionRelation()->get();
    }

    /**
     * @return bool
     */
    public function stillHasPlace()
    {
        return count($this->subscriptions()) < $this->limit();
    }

    /**
     * @return bool
     */
    public function canStillBeCanceled()
    {
        if (Carbon::now()->addHours(2) > $this->date()) {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function cannotBeCanceled()
    {
        return ! $this->canStillBeCanceled();
    }

    /**
     * @return bool
     */
    public function limitReached()
    {
        return count($this->subscriptions()) >= $this->limit();
    }

    /**
     * @return int
     */
    public function level()
    {
        return $this->level;
    }

    /**
     * @return string
     */
    public function readableLevel()
    {
        switch ($this->level()) {
            case self::BEGINNERS:
                return 'Beginners';

            case self::HALF_GEVORDERDEN:
                return 'Half Gevorderden';

            case self::GEVORDERDEN:
                return 'Gevorderden';
        }
    }
}
