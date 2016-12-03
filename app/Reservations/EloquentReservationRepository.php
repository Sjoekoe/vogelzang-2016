<?php
namespace App\Reservations;

use App\Users\User;
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

    /**
     * @param \App\Users\User $user
     * @param array $values
     * @return \App\Reservations\Reservation
     */
    public function create(User $user, array $values)
    {
        $reservation = new EloquentReservation();
        $reservation->user_id = $user->id();
        $reservation->type = $values['type'];
        $reservation->comment = $values['comment'];
        $reservation->start = Carbon::createFromFormat('d-m-Y H:i', $values['date'] . ' ' . $values['start_time']);
        $reservation->end = Carbon::createFromFormat('d-m-Y H:i', $values['date'] . ' ' . $values['end_time']);

        $reservation->save();

        return $reservation;
    }
}
