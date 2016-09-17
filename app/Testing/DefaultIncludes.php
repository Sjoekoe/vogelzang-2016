<?php
namespace App\Testing;

use App\Rosters\Roster;
use App\Users\User;

trait DefaultIncludes
{
    /**
     * @param \App\Users\User $user
     * @param array $attributes
     * @return array
     */
    public function includedUser(User $user, $attributes = [])
    {
        return array_merge([
            'id' => $user->id(),
            'username' => $user->username(),
            'email' => $user->email(),
            'first_name' => $user->firstName(),
            'last_name' => $user->lastName(),
            'active' => (bool) $user->active(),
        ], $attributes);
    }

    /**
     * @param \App\Rosters\Roster $roster
     * @param array $attributes
     * @return array
     */
    public function includedRoster(Roster $roster, $attributes = [])
    {
        return array_merge([
            'id' => $roster->id(),
            'type' => $roster->type(),
            'date' => $roster->date()->toIso8601String(),
            'description' => $roster->description(),
            'limit' => $roster->limit(),
        ], $attributes);
    }
}