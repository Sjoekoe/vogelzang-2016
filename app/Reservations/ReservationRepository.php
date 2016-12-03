<?php
namespace App\Reservations;

use App\Users\User;

interface ReservationRepository
{
    /**
     * @return \App\Reservations\Reservation[]
     */
    public function findAll();

    /**
     * @param int $id
     * @return \App\Reservations\Reservation|null
     */
    public function find($id);

    /**
     * @param \App\Users\User $user
     * @param array $values
     * @return \App\Reservations\Reservation
     */
    public function create(User $user, array $values);

    /**
     * @param \App\Reservations\Reservation $reservation
     */
    public function delete(Reservation $reservation);
}
