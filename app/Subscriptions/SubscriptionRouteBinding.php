<?php
namespace App\Subscriptions;

use App\Http\AbstractRouteBinding;
use App\Http\Routebinding;

class SubscriptionRouteBinding extends AbstractRouteBinding implements Routebinding
{
    /**
     * @var \App\Subscriptions\SubscriptionRepository
     */
    private $subscriptions;

    public function __construct(SubscriptionRepository $subscriptions)
    {
        $this->subscriptions = $subscriptions;
    }

    /**
     * @param int|string $value
     * @return \App\Subscriptions\Subscription|null
     */
    public function find($value)
    {
        return $this->subscriptions->find($value);
    }
}
