<?php
namespace App\Subscriptions;

use App\Riders\Rider;
use App\Rosters\Roster;

class EloquentSubscriptionRepository implements SubscriptionRepository
{
    /**
     * @var \App\Subscriptions\Subscription
     */
    private $subscription;

    public function __construct(Subscription $subscription)
    {
        $this->subscription = $subscription;
    }

    /**
     * @param \App\Rosters\Roster $roster
     * @return \App\Subscriptions\Subscription
     */
    public function findAllByRoster(Roster $roster)
    {
        return $this->subscription
            ->where('roster_id', $roster->id())
            ->get();
    }

    /**
     * @param \App\Rosters\Roster $roster
     * @param $riderId
     * @return \App\Subscriptions\Subscription
     */
    public function create(Roster $roster, $riderId)
    {
        $subscription = new EloquentSubscription();
        $subscription->roster_id = $roster->id();
        $subscription->rider_id = $riderId;

        $subscription->save();

        return $subscription;
    }

    /**
     * @param \App\Subscriptions\Subscription $subscription
     */
    public function delete(Subscription $subscription)
    {
        $subscription->delete();
    }

    /**
     * @param int $id
     * @return \App\Subscriptions\Subscription|null
     */
    public function find($id)
    {
        return $this->subscription
            ->where('id', $id)
            ->first();
    }

    /**
     * @return int
     */
    public function count()
    {
        return $this->subscription->count();
    }

    /**
     * @param \App\Riders\Rider $rider
     * @param \App\Rosters\Roster $roster
     * @return \App\Subscriptions\Subscription
     */
    public function findByRiderAndRoster(Rider $rider, Roster $roster)
    {
        return $this->subscription
            ->where('rider_id', $rider->id())
            ->where('roster_id', $roster->id())
            ->first();
    }
}
