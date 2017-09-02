<?php
namespace App\Http\Controllers;

use App\Faqs\FaqRepository;
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

    /**
     * @var \App\Faqs\FaqRepository
     */
    private $faqs;

    public function __construct(
        RiderRepository $riders,
        RosterRepository $rosters,
        SubscriptionRepository $subscriptions,
        FaqRepository $faqs
    ) {
        $this->riders = $riders;
        $this->rosters = $rosters;
        $this->subscriptions = $subscriptions;
        $this->faqs = $faqs;
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

    public function faq()
    {
        $faqs = $this->faqs->all();

        return view('home.faq', compact('faqs'));
    }

    public function about()
    {
        $ridersCount = $this->riders->count();
        $lessonCount = $this->rosters->count();
        $subscriptionCount = $this->subscriptions->count();

        return view('home.about', compact('ridersCount', 'lessonCount', 'subscriptionCount'));
    }

    public function gWerking()
    {
        return view('g-werking.index');
    }

    public function contact()
    {
        return view('home.contact');
    }
}
