<?php
namespace App\Reservations;

interface Reservation
{
    const TABLE = 'reservations';

    const DRESSUURLES = 1;
    const SPRINGLES = 2;
    const ONDERHOUD = 3;
    const ANDERE = 4;

    /**
     * @return int
     */
    public function id();

    /**
     * @return \App\Users\User
     */
    public function user();

    /**
     * @return \Carbon\Carbon
     */
    public function start();

    /**
     * @return \Carbon\Carbon
     */
    public function end();

    /**
     * @return string
     */
    public function comment();

    /**
     * @return int
     */
    public function type();

    /**
     * @return int
     */
    public function rawType();

    /**
     * @return \Carbon\Carbon
     */
    public function createdAt();

    /**
     * @return \Carbon\Carbon
     */
    public function updatedAt();
}
