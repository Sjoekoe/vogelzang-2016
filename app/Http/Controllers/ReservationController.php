<?php
namespace App\Http\Controllers;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('owner');
    }

    public function index()
    {
        return view('reservations.index');
    }
}
