<?php
namespace App\Rosters;

interface Roster
{
    const TABLE = 'rosters';

    /**
     * @return int
     */
    public function id();

    /**
     * @return \Carbon\Carbon
     */
    public function date();

    /**
     * @return int
     */
    public function type();

    /**
     * @return string
     */
    public function name();

    /**
     * @return string
     */
    public function description();

    /**
     * @return int
     */
    public function hour();

    /**
     * @return int
     */
    public function limit();

    /**
     * @return \App\Subscriptions\Subscription[]
     */
    public function subscriptions();

    /**
     * @return bool
     */
    public function stillHasPlace();

    /**
     * @return bool
     */
    public function canStillBeCanceled();

    /**
     * @return bool
     */
    public function cannotBeCanceled();

    /**
     * @return \Carbon\Carbon
     */
    public function createdAt();

    /**
     * @return \Carbon\Carbon
     */
    public function updatedAt();
}
