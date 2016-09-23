<?php
namespace App\Rosters;

interface Roster
{
    const TABLE = 'rosters';

    const GROEPLES = 1;
    const OUDERLES = 2;
    const PRIVE_LES = 3;
    const SPRINGLES = 4;
    const WANDELING = 5;
    const DRESSUURLES = 6;
    const GROEPSLES_GEVORDERDEN = 7;
    const SPRINGLES_GEVORDERDEN = 8;

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
     * @return bool
     */
    public function limitReached();

    /**
     * @return \Carbon\Carbon
     */
    public function createdAt();

    /**
     * @return \Carbon\Carbon
     */
    public function updatedAt();
}
