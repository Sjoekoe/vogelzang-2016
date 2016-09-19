<?php
namespace App\Subscriptions;

use App\Rosters\Roster;

interface SubscriptionRepository
{
    /**
     * @param \App\Rosters\Roster $roster
     * @return \App\Subscriptions\Subscription
     */
    public function findAllByRoster(Roster $roster);

    /**
     * @param \App\Rosters\Roster $roster
     * @param $riderId
     * @return \App\Subscriptions\Subscription
     */
    public function create(Roster $roster, $riderId);

    /**
     * @param \App\Subscriptions\Subscription $subscription
     */
    public function delete(Subscription $subscription);

    /**
     * @param int $id
     * @return \App\Subscriptions\Subscription|null
     */
    public function find($id);

    /**
     * @return int
     */
    public function count();
}
