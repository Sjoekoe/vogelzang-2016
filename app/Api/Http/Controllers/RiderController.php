<?php
namespace App\Api\Http\Controllers;

use App\Api\Http\Controller;
use App\Api\Riders\RiderTransformer;
use App\Api\Subscriptions\SubscriptionTransformer;
use App\Riders\Rider;
use App\Riders\RiderRepository;
use App\Rosters\Roster;
use App\Subscriptions\SubscriptionRepository;

class RiderController extends Controller
{
    /**
     * @var \App\Riders\RiderRepository
     */
    private $riders;

    /**
     * @var \App\Subscriptions\SubscriptionRepository
     */
    private $subscriptions;

    public function __construct(RiderRepository $riders, SubscriptionRepository $subscriptions)
    {
        $this->riders = $riders;
        $this->subscriptions = $subscriptions;
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

    public function getSubscription(Rider $rider, Roster $roster)
    {
        $subscription = $this->subscriptions->findByRiderAndRoster($rider, $roster);

        return $this->response()->item($subscription, new SubscriptionTransformer());
    }
}
