<?php
namespace App\Reservations;

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
     * @param \App\Reservations\Reservation $reservation
     */
    public function delete(Reservation $reservation);
}
