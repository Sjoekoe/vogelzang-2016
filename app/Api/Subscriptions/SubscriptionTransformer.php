<?php
namespace App\Api\Subscriptions;

use App\Api\Riders\RiderTransformer;
use App\Api\Rosters\RosterTransformer;
use App\Subscriptions\Subscription;
use League\Fractal\TransformerAbstract;

class SubscriptionTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $defaultIncludes = ['riderRelation', 'rosterRelation'];

    /**
     * @param \App\Subscriptions\Subscription $subscription
     * @return array
     */
    public function transform(Subscription $subscription)
    {
        return [
            'id' => $subscription->id(),
        ];
    }

    /**
     * @param \App\Subscriptions\Subscription $subscription
     * @return \League\Fractal\Resource\Item
     */
    public function includeRiderRelation(Subscription $subscription)
    {
        return $this->item($subscription->rider(), new RiderTransformer());
    }

    /**
     * @param \App\Subscriptions\Subscription $subscription
     * @return \League\Fractal\Resource\Item
     */
    public function includeRosterRelation(Subscription $subscription)
    {
        return $this->item($subscription->roster(), new RosterTransformer());
    }
}
