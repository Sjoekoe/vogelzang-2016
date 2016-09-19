<?php
namespace App\Subscriptions;

use App\Models\StandardModel;
use App\Riders\EloquentRider;
use App\Rosters\EloquentRoster;
use Illuminate\Database\Eloquent\Model;

class EloquentSubscription extends Model implements Subscription
{
    use StandardModel;

    /**
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function riderRelation()
    {
        return $this->belongsTo(EloquentRider::class, 'rider_id', 'id');
    }

    /**
     * @return \App\Rosters\Roster
     */
    public function rider()
    {
        return $this->riderRelation()->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rosterRelation()
    {
        return $this->belongsTo(EloquentRoster::class, 'roster_id', 'id');
    }

    /**
     * @return \App\Rosters\Roster
     */
    public function roster()
    {
        return $this->rosterRelation()->first();
    }
}
