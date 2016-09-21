<?php
namespace App\Http\Controllers;

class RiderController extends Controller
{
    /**
     * RiderController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('riders.index');
    }
}
