<?php

use App\Testing\DefaultIncludes;
use App\Users\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersTest extends \TestCase
{
    use DatabaseTransactions, DefaultIncludes;

    /** @test */
    function it_can_get_all_users_paginated()
    {
        $user = $this->createUser();

        $this->get('/api/users')
            ->seeJsonEquals([
                'data' => [
                    $this->includedUser($user),
                ],
                'meta' => [
                    'pagination' => [
                        'count' => 1,
                        'current_page' => 1,
                        'links' => [],
                        'per_page' => 20,
                        'total_pages' => 1,
                        'total' => 1,
                    ],
                ],
            ]);
    }

    /** @test */
    function it_can_create_a_user()
    {
        $this->post('/api/users', [
            'first_name' => 'Foo',
            'last_name' => 'bar',
            'email' => 'foo@bar.com',
            'username' => 'foobar',
            'level_id' => User::USER
        ])->seeJsonEquals([
            'data' => [
                'id' => DB::table(User::TABLE)->first()->id,
                'username' => 'foobar',
                'email' => 'foo@bar.com',
                'first_name' => 'Foo',
                'last_name' => 'bar',
                'active' => false,
            ],
        ]);
    }

    /** @test */
    function it_can_show_a_user()
    {
        $user = $this->createUser();

        $this->get('/api/users/' . $user->id())
            ->seeJsonEquals([
                'data' => $this->includedUser($user),
            ]);
    }

    /** @test */
    function it_can_update_a_user()
    {
        $user = $this->createUser();

        $this->put('/api/users/' . $user->id(), [
            'username' => 'barbarbar',
            'first_name' => $user->firstName(),
            'last_name' => $user->lastName(),
            'email' => 'barbarbar@foo.com',
        ])->seeJsonEquals([
            'data' => $this->includedUser($user, [
                'username' => 'barbarbar',
                'email' => 'barbarbar@foo.com',
            ])
        ]);
    }

    /** @test */
    function it_can_delete_a_user()
    {
        $user = $this->createUser();

        $this->seeInDatabase(User::TABLE, [
            'id' => $user->id(),
        ]);

        $this->delete('/api/users/' . $user->id())
            ->assertNoContent();

        $this->missingFromDatabase(User::TABLE, [
            'id' => $user->id(),
        ]);
    }
}
