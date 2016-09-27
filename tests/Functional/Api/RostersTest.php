<?php

use App\Rosters\Roster;
use App\Testing\DefaultIncludes;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class RostersTest extends \TestCase
{
    use DefaultIncludes, DatabaseTransactions;

    /** @test */
    function it_can_find_all_rosters_paginated()
    {
        $roster = $this->createRoster();

        $this->get('/api/rosters')
            ->seeJsonEquals([
                'data' => [
                    $this->includedRoster($roster),
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
    function it_can_create_a_roster()
    {
        $date = Carbon::now();

        $this->post('/api/rosters', [
            'name' => 1,
            'hour' => 1,
            'type' => Roster::GROEPLES,
            'date' => $date->format('d/m/Y'),
            'description' => 'Foo description',
            'limit' => 10,
        ])->seeJsonEquals([
            'data' => [
                'id' => DB::table(Roster::TABLE)->first()->id,
                'type' => Roster::GROEPLES,
                'date' => $date->toIso8601String(),
                'description' => 'Foo description',
                'limit' => 10,
            ]
        ]);
    }

    /** @test */
    function it_can_show_a_roster()
    {
        $roster = $this->createRoster();

        $this->get('/api/rosters/' . $roster->id())
            ->seeJsonEquals([
                'data' => $this->includedRoster($roster),
            ]);
    }

    /** @test */
    function it_can_update_a_roster()
    {
        $now = Carbon::now();
        $roster = $this->createRoster();

        $this->put('/api/rosters/' . $roster->id(), [
            'name' => 'updated name',
            'date' => $now->format('d/m/Y'),
            'description' => 'Bar description',
        ])->seeJsonEquals([
            'data' => $this->includedRoster($roster, [
                'date' => $now->toIso8601String(),
                'description' => 'Bar description',
            ])
        ]);
    }

    /** @test */
    function it_can_delete_a_roster()
    {
        $roster = $this->createRoster();

        $this->seeInDatabase(Roster::TABLE, [
            'id' => $roster->id(),
        ]);

        $this->delete('/api/rosters/' . $roster->id())
            ->assertNoContent();

        $this->missingFromDatabase(Roster::TABLE, [
            'id' => $roster->id(),
        ]);
    }
}
