<?php
namespace App\Http\Controllers;

use App\Riders\RiderRepository;
use App\Rosters\RosterRepository;
use App\Subscriptions\SubscriptionRepository;

class HomeController extends Controller
{
    /**
     * @var \App\Riders\RiderRepository
     */
    private $riders;

    /**
     * @var \App\Rosters\RosterRepository
     */
    private $rosters;

    /**
     * @var \App\Subscriptions\SubscriptionRepository
     */
    private $subscriptions;

    public function __construct(
        RiderRepository $riders,
        RosterRepository $rosters,
        SubscriptionRepository $subscriptions
    ) {
        $this->riders = $riders;
        $this->rosters = $rosters;
        $this->subscriptions = $subscriptions;
    }

    public function index()
    {
        return view('home.index');
    }

    public function accommodation()
    {
        return view('home.accommodation');
    }

    public function manege()
    {
        return view('home.manege');
    }

    public function about()
    {
        $ridersCount = $this->riders->count();
        $lessonCount = $this->rosters->count();
        $subscriptionCount = $this->subscriptions->count();

        return view('home.about', compact('ridersCount', 'lessonCount', 'subscriptionCount'));
    }

    public function contact()
    {
        return view('home.contact');
    }
}
