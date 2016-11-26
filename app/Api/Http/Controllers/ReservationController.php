<?php
namespace App\Api\Http\Controllers;

use App\Api\Http\Controller;
use App\Api\Reservations\ReservationTransformer;
use App\Reservations\ReservationRepository;

class ReservationController extends Controller
{
    /**
     * @var \App\Reservations\ReservationRepository
     */
    private $reservations;

    public function __construct(ReservationRepository $reservations)
    {
        $this->reservations = $reservations;
    }

    public function index()
    {
        $reservations = $this->reservations->findAll();

        return $this->response()->collection($reservations, new ReservationTransformer());
    }
}
