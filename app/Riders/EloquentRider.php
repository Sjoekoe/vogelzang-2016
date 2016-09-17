<?php
namespace App\Riders;

use App\Models\StandardModel;
use App\Rosters\Roster;
use App\Users\EloquentUser;
use Illuminate\Database\Eloquent\Model;

class EloquentRider extends Model implements Rider
{
    use StandardModel;

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
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function lastName()
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function fullName()
    {
        return $this->firstName() . ' ' . $this->lastName();
    }

    /**
     * @return \App\Users\User
     */
    public function user()
    {
        return $this->belongsTo(EloquentUser::class, 'user_id', 'id')->first();
    }

    /**
     * @return \App\Subscriptions\Subscription
     */
    public function subscriptions()
    {
        //
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
}
