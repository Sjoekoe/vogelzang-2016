<?php
namespace App\Api\Http\Controllers;

use App\Api\Http\Controller;
use App\Api\Riders\RiderTransformer;
use App\Riders\Requests\StoreRiderRequest;
use App\Riders\Rider;
use App\Riders\RiderRepository;
use App\Users\User;

class UserRiderController extends Controller
{
    /**
     * @var \App\Riders\RiderRepository
     */
    private $riders;

    public function __construct(RiderRepository $riders)
    {
        $this->riders = $riders;
    }

    public function index(User $user)
    {
        $riders = $this->riders->findAllForUser($user);

        return $this->response()->collection($riders, new RiderTransformer());
    }

    public function store(StoreRiderRequest $request)
    {
        $rider = $this->riders->create($this->auth()->user(), $request->all());

        return $this->response()->item($rider, new RiderTransformer());
    }

    public function update(StoreRiderRequest $request, User $user, Rider $rider)
    {
        $rider = $this->riders->update($rider, $request->all());

        return $this->response()->item($rider, new RiderTransformer());
    }
}
