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
     * @return \App\Rosters\Roster
     */
    public function rider()
    {
        return $this->belongsTo(EloquentRider::class, 'rider_id', 'id')->first();
    }

    /**
     * @return \App\Rosters\Roster
     */
    public function roster()
    {
        return $this->belongsTo(EloquentRoster::class, 'roster_id', 'id')->first();
    }
}
