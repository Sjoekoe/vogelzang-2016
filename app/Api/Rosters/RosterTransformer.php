<?php
namespace App\Api\Rosters;

use App\Api\Subscriptions\SubscriptionTransformer;
use App\Rosters\Roster;
use League\Fractal\TransformerAbstract;

class RosterTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $availableIncludes = ['subscriptionRelation'];

    /**
     * @param \App\Rosters\Roster $roster
     * @return array
     */
    public function transform(Roster $roster)
    {
        return [
            'id' => $roster->id(),
            'type' => config('rosters.name.' . $roster->type()),
            'date' => $roster->date()->format('l d-m-Y'),
            'time' => $roster->date()->format('H:i'),
            'description' => $roster->description(),
            'limit' => $roster->limit(),
            'limit_reached' => $roster->limitReached(),
        ];
    }

    /**
     * @param \App\Rosters\Roster $roster
     * @return \League\Fractal\Resource\Collection
     */
    public function includeSubscriptionRelation(Roster $roster)
    {
        return $this->collection($roster->subscriptions(), new SubscriptionTransformer());
    }
}
