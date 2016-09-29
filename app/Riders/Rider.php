<?php
namespace App\Riders;

use App\Rosters\Roster;

interface Rider
{
    const TABLE = 'riders';

    /**
     * @return int
     */
    public function id();

    /**
     * @return string
     */
    public function firstName();

    /**
     * @return string
     */
    public function lastName();

    /**
     * @return string
     */
    public function fullName();

    /**
     * @return \App\Users\User
     */
    public function user();

    /**
     * @return \App\Subscriptions\Subscription
     */
    public function subscriptions();

    /**
     * @param \App\Rosters\Roster $roster
     * @return bool
     */
    public function hasNoSubscriptionForRoster(Roster $roster);

    /**
     * @return \App\Rosters\Roster
     */
    public function rosters();

    /**
     * @return \Carbon\Carbon
     */
    public function createdAt();

    /**
     * @return \Carbon\Carbon
     */
    public function updatedAt();
}
