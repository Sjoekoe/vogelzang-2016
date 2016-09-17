<?php
namespace App\Api\Users;

use App\Users\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
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
            'first_name' => $user->firstName(),
            'last_name' => $user->lastName(),
            'active' => (bool) $user->active(),
        ];
    }
}
