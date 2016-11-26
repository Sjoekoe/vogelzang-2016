<?php
namespace App\Api\Reservations;

use App\Api\Users\UserTransformer;
use App\Reservations\Reservation;
use League\Fractal\TransformerAbstract;

class ReservationTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $defaultIncludes = [
        'userRelation'
    ];

    /**
     * @param \App\Reservations\Reservation $reservation
     * @return array
     */
    public function transform(Reservation $reservation)
    {
        return [
            'id' => $reservation->id(),
            'start_time' => $reservation->start()->format('H:i'),
            'end_time' => $reservation->end()->format('H:i'),
            'type' => $reservation->type(),
            'raw_type' => $reservation->rawType(),
            'comment' => $reservation->comment(),
            'week_day' => $reservation->start()->format('d'),
        ];
    }

    /**
     * @param \App\Reservations\Reservation $reservation
     * @return \League\Fractal\Resource\Item
     */
    public function includeUserRelation(Reservation $reservation)
    {
        return $this->item($reservation->user(), new UserTransformer());
    }
}
