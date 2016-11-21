<?php
namespace App\Api\Users;

use App\Api\Riders\RiderTransformer;
use App\Users\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $availableIncludes = ['riderRelation'];

    /**
     * @param \App\Users\User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => $user->id(),
            'username' => $user->username(),
            'email' => $user->email(),
            'phone' => $user->telephone(),
            'first_name' => $user->firstName(),
            'last_name' => $user->lastName(),
            'active' => (bool) $user->active(),
            'level' => $user->level(),
            'created_at' => $user->createdAt()->format('d-m-Y'),
        ];
    }

    /**
     * @param \App\Users\User $user
     * @return \League\Fractal\Resource\Collection
     */
    public function includeRiderRelation(User $user)
    {
        return $this->collection($user->riders(), new RiderTransformer());
    }
}
