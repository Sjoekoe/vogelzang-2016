<?php
namespace App\Http\Controllers;

use App\Articles\ArticleRepository;
use App\Riders\RiderRepository;
use App\Rosters\RosterRepository;
use App\Subscriptions\SubscriptionRepository;

class HomeController extends Controller
{
    /**
     * @var \App\Articles\ArticleRepository
     */
    private $articles;

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
        ArticleRepository $articles, 
        RiderRepository $riders, 
        RosterRepository $rosters, 
        SubscriptionRepository $subscriptions
    ) {
        $this->articles = $articles;
        $this->riders = $riders;
        $this->rosters = $rosters;
        $this->subscriptions = $subscriptions;
    }

    public function index()
    {
        $articles = $this->articles->findAllPaginated(2);
        $ridersCount = $this->riders->count();
        $lessonCount = $this->rosters->count();
        $subscriptionCount = $this->subscriptions->count();
        
        return view('home.index', compact('articles', 'ridersCount', 'lessonCount', 'subscriptionCount'));
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
        return view('home.about');
    }
}
