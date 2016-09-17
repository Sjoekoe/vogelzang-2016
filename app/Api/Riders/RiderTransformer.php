<?php
namespace App\Api\Riders;

use App\Api\Users\UserTransformer;
use App\Riders\Rider;
use League\Fractal\TransformerAbstract;

class RiderTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $defaultIncludes = ['userRelation'];

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
}
