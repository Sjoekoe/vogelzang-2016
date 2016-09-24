<?php
namespace App\Api\Http\Controllers;

use App\Api\Http\Controller;
use App\Api\Riders\RiderTransformer;
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
}
