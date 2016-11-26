<?php
namespace App\Reservations;

use Carbon\Carbon;

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
        $start = Carbon::now()->startOfDay();
        $end = Carbon::now()->addWeek()->endOfDay();

        return $this->reservation
            ->where('start', '>', $start)
            ->where('end', '<', $end)
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
