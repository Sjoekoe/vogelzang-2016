<?php
namespace App\Api\Http\Controllers;

use App\Api\Http\Controller;
use App\Api\Subscriptions\SubscriptionTransformer;
use App\Rosters\Roster;
use App\Subscriptions\Subscription;
use App\Subscriptions\SubscriptionRepository;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * @var \App\Subscriptions\SubscriptionRepository
     */
    private $subscriptions;

    public function __construct(SubscriptionRepository $subscriptions)
    {
        $this->subscriptions = $subscriptions;
    }

    public function index(Roster $roster)
    {
        $subscriptions = $this->subscriptions->findAllByRoster($roster);

        return $this->response()->collection($subscriptions, new SubscriptionTransformer());
    }
    
    public function store(Request $request, Roster $roster)
    {
        $subscription = $this->subscriptions->create($roster, $request->get('rider_id'));
        
        return $this->response()->item($subscription, new SubscriptionTransformer());
    }
    
    public function delete(Roster $roster, Subscription $subscription)
    {
        $this->subscriptions->delete($subscription);
        
        return $this->response()->noContent();
    }
}
