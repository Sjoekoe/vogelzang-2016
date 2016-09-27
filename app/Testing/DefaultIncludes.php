<?php
namespace App\Testing;

use App\Articles\Article;
use App\Contacts\Contact;
use App\Pictures\Picture;
use App\Riders\Rider;
use App\Rosters\Roster;
use App\Subscriptions\Subscription;
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
            'type' => config('rosters.name.' . $roster->type()),
            'date' => $roster->date()->format('l d-m-Y'),
            'time' => $roster->date()->format('H:i'),
            'description' => $roster->description(),
            'limit' => $roster->limit(),
            'limit_reached' => $roster->limitReached(),
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
            'created_at' => $contact->createdAt()->format('d-m-Y'),
        ], $attributes);
    }

    /**
     * @param \App\Articles\Article $article
     * @param array $attributes
     * @return array
     */
    public function includedArticle(Article $article, $attributes = [])
    {
        return array_merge([
            'id' => $article->id(),
            'title' => $article->title(),
            'message' => $article->message(),
            'created_at' => $article->createdAt()->toIso8601String(),
            'userRelation' => [
                'data' => $this->includedUser($article->author()),
            ],
        ], $attributes);
    }

    /**
     * @param \App\Pictures\Picture $picture
     * @param array $attributes
     * @return array
     */
    public function includedPicture(Picture $picture, $attributes = [])
    {
        return array_merge([
            'id' => $picture->id(),
            'path' => $picture->path(),
            'articleRelation' => [
                'data' => $this->includedArticle($picture->article()),
            ]
        ], $attributes);
    }

    /**
     * @param \App\Subscriptions\Subscription $subscription
     * @param array $attributes
     * @return array
     */
    public function includedSubscription(Subscription $subscription, $attributes = [])
    {
        return array_merge([
            'id' => $subscription->id(),
            'riderRelation' => [
                'data' => $this->includedRider($subscription->rider()),
            ],
            'rosterRelation' => [
                'data' => $this->includedRoster($subscription->roster()),
            ],
        ], $attributes);
    }
}
