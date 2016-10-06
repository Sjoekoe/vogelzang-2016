<?php
namespace App\Api\Riders;

use App\Api\Rosters\RosterTransformer;
use App\Api\Subscriptions\SubscriptionTransformer;
use App\Api\Users\UserTransformer;
use App\Riders\Rider;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class RiderTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $defaultIncludes = ['userRelation'];

    /**
     * @var array
     */
    protected $availableIncludes = ['subscriptionRelation', 'rosterRelation'];

    /**
     * @param \App\Riders\Rider $rider
     * @return array
     */
    public function transform(Rider $rider)
    {
        return [
            'id' => $rider->id(),
            'first_name' => $rider->firstName(),
            'last_name' => $rider->lastName(),
            'birth_day' => $rider->birthDay()->format('d F'),
            'age' => $rider->age(),
            'is_celebrating' => (bool) $rider->birthDay()->format('d-m') == Carbon::now()->format('d-m'),
        ];
    }

    /**
     * @param \App\Riders\Rider $rider
     * @return \League\Fractal\Resource\Item
     */
    public function includeUserRelation(Rider $rider)
    {
        return $this->item($rider->user(), new UserTransformer());
    }

    /**
     * @param \App\Riders\Rider $rider
     * @return \League\Fractal\Resource\Collection
     */
    public function includeSubscriptionRelation(Rider $rider)
    {
        return $this->collection($rider->subscriptions(), new SubscriptionTransformer());
    }

    /**
     * @param \App\Riders\Rider $rider
     * @return \League\Fractal\Resource\Collection
     */
    public function includeRosterRelation(Rider $rider)
    {
        return $this->collection($rider->rosters(), new RosterTransformer());
    }
}
