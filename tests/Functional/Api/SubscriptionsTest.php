<?php

use App\Subscriptions\Subscription;
use App\Testing\DefaultIncludes;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubscriptionsTest extends \TestCase
{
    use DefaultIncludes, DatabaseTransactions;

    /** @test */
    function it_can_get_all_subscriptions_for_a_roster()
    {
        $roster = $this->createRoster();
        $user = $this->createUser();
        $rider = $this->createRider(['user_id' => $user->id()]);
        $subscription = $this->createSubscription([
            'roster_id' => $roster->id(),
            'rider_id' => $rider->id(),
        ]);

        $this->get('/api/rosters/' . $roster->id() . '/subscriptions')
        ->seeJsonEquals([
            'data' => [
                $this->includedSubscription($subscription),
            ],
        ]);
    }

    /** @test */
    function it_can_create_a_subscription()
    {
        $roster = $this->createRoster();
        $user = $this->createUser();
        $rider = $this->createRider(['user_id' => $user->id()]);

        $this->post('/api/rosters/' . $roster->id() . '/subscriptions', [
            'rider_id' => $rider->id(),
        ])->seeJsonEquals([
            'data' => [
                'id' => DB::table(Subscription::TABLE)->first()->id,
                'rosterRelation' => [
                    'data' => $this->includedRoster($roster),
                ],
                'riderRelation' => [
                    'data' => $this->includedRider($rider),
                ]
            ]
        ]);
    }

    /** @test */
    function it_can_remove_a_subscription()
    {
        $roster = $this->createRoster();
        $user = $this->createUser();
        $rider = $this->createRider(['user_id' => $user->id()]);
        $subscription = $this->createSubscription([
            'roster_id' => $roster->id(),
            'rider_id' => $rider->id(),
        ]);

        $this->seeInDatabase(Subscription::TABLE, ['id' => $subscription->id()]);

        $this->delete('/api/rosters/' . $roster->id() . '/subscriptions/' . $subscription->id())
            ->assertNoContent();

        $this->missingFromDatabase(Subscription::TABLE, ['id' => $subscription->id()]);
    }
}
