<?php
namespace App\Subscriptions;

interface Subscription
{
    const TABLE = 'subscriptions';

    /**
     * @return int
     */
    public function id();

    /**
     * @return \App\Rosters\Roster
     */
    public function rider();

    /**
     * @return \App\Rosters\Roster
     */
    public function roster();

    /**
     * @return \Carbon\Carbon
     */
    public function createdAt();

    /**
     * @return \Carbon\Carbon
     */
    public function updatedAt();
}
