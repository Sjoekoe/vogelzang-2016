<?php

use App\Testing\DefaultIncludes;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RidersTest extends \TestCase
{
    use DatabaseTransactions, DefaultIncludes;

    /** @test */
    public function it_can_get_all_riders()
    {
        $user = $this->createUser();
        $rider = $this->createRider([
            'user_id' => $user->id(),
        ]);

        $this->get('/api/riders')
            ->seeJsonEquals([
                'data' => [
                    $this->includedRider($rider),
                ],
                'meta' => [
                    'pagination' => [
                        'count' => 1,
                        'current_page' => 1,
                        'links' => [],
                        'per_page' => 50,
                        'total_pages' => 1,
                        'total' => 1,
                    ],
                ],
            ]);
    }

    /** @test */
    public function it_can_show_a_rider()
    {
        $user = $this->createUser();
        $rider = $this->createRider([
            'user_id' => $user->id(),
        ]);

        $this->get('/api/riders/' . $rider->id())
            ->seeJsonEquals([
                'data' => $this->includedRider($rider),
            ]);
    }
}
