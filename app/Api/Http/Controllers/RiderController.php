<?php
namespace App\Api\Http\Controllers;

use App\Api\Http\Controller;
use App\Api\Riders\RiderTransformer;
use App\Riders\Rider;
use App\Riders\RiderRepository;

class RiderController extends Controller
{
    /**
     * @var \App\Riders\RiderRepository
     */
    private $riders;

    public function __construct(RiderRepository $riders)
    {
        $this->riders = $riders;
    }

    public function index()
    {
        $riders = $this->riders->findAllPaginated();

        return $this->response()->paginator($riders, new RiderTransformer());
    }

    public function show(Rider $rider)
    {
        return $this->response()->item($rider, new RiderTransformer());
    }
}
