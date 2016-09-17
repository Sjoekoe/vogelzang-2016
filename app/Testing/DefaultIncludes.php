<?php
namespace App\Testing;

use App\Contacts\Contact;
use App\Riders\Rider;
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

    /**
     * @param \App\Riders\Rider $rider
     * @param array $attributes
     * @return array
     */
    public function includedRider(Rider $rider, $attributes = [])
    {
        return array_merge([
            'id' => $rider->id(),
            'first_name' => $rider->firstName(),
            'last_name' => $rider->lastName(),
            'userRelation' => [
                'data' => $this->includedUser($rider->user()),
            ]
        ], $attributes);
    }

    /**
     * @param \App\Contacts\Contact $contact
     * @param array $attributes
     * @return array
     */
    public function includedEntry(Contact $contact, $attributes = [])
    {
        return array_merge([
            'id' => $contact->id(),
            'name' => $contact->fullName(),
            'email' => $contact->email(),
            'subject' => $contact->subject(),
            'message' => $contact->message(),
            'is_read' => $contact->isRead(),
        ], $attributes);
    }
}
