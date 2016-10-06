<?php
namespace App\Riders;

use App\Models\StandardModel;
use App\Rosters\EloquentRoster;
use App\Rosters\Roster;
use App\Subscriptions\EloquentSubscription;
use App\Subscriptions\Subscription;
use App\Users\EloquentUser;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EloquentRider extends Model implements Rider
{
    use StandardModel;

    /**
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'user_id', 'turns'];

    /**
     * @return string
     */
    public function firstName()
    {
        return ucfirst($this->firstname);
    }

    /**
     * @return string
     */
    public function lastName()
    {
        return ucfirst($this->lastname);
    }

    /**
     * @return string
     */
    public function fullName()
    {
        return $this->firstName() . ' ' . $this->lastName();
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
        return $this->userRelation()->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptionRelation()
    {
        return $this->hasMany(EloquentSubscription::class, 'rider_id', 'id');
    }

    /**
     * @return \App\Subscriptions\Subscription
     */
    public function subscriptions()
    {
        return $this->subscriptionRelation()->get();
    }

    /**
     * @param \App\Rosters\Roster $roster
     * @return bool
     */
    public function hasNoSubscriptionForRoster(Roster $roster)
    {
        foreach ($this->subscriptions() as $subscription) {
            if ($subscription->roster()->id() == $roster->id()) {
                return false;
            }
        }

        return true;
    }

    public function rosterRelation()
    {
        return $this->belongsToMany(EloquentRoster::class, Subscription::TABLE, 'rider_id', 'roster_id');
    }

    /**
     * @return \App\Rosters\Roster
     */
    public function rosters()
    {
        return $this->rosterRelation()->where('date', '>=', Carbon::now())->orderBy('date')->get();
    }

    /**
     * @return \Carbon\Carbon
     */
    public function birthDay()
    {
        return Carbon::parse($this->birth_day);
    }

    /**
     * @return int
     */
    public function age()
    {
        return $this->birthDay()->startOfDay()->diffInYears();
    }
}
