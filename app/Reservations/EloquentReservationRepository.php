<?php
namespace App\Reservations;

class EloquentReservationRepository implements ReservationRepository
{
    /**
     * @var \App\Reservations\EloquentReservation
     */
    private $reservation;

    public function __construct(EloquentReservation $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * @return \App\Reservations\Reservation[]
     */
    public function findAll()
    {
        return $this->reservation
            ->orderBy('start')
            ->get();
    }

    /**
     * @param int $id
     * @return \App\Reservations\Reservation|null
     */
    public function find($id)
    {
        return $this->reservation
            ->where('id', $id)
            ->first();
    }

    /**
     * @param \App\Reservations\Reservation $reservation
     */
    public function delete(Reservation $reservation)
    {
        $reservation->delete();
    }
}
