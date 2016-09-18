<?php

use App\Contacts\Contact;
use App\Testing\DefaultIncludes;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FormentriesTest extends \TestCase
{
    use DatabaseTransactions, DefaultIncludes;

    /** @test */
    function it_can_get_all_form_entries_paginated()
    {
        $entry = $this->createFormEntry();

        $this->get('/api/formentries')
            ->seeJsonEquals([
                'data' => [
                    $this->includedEntry($entry),
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
    function it_can_create_a_form_entry()
    {
        $this->post('/api/formentries', [
            'name' => 'Test person',
            'email' => 'test@person.com',
            'subject' => 'this is a subject',
            'message' => 'this is a message',
        ])->seeJsonEquals([
            'data' => [
                'id' => DB::table(Contact::TABLE)->first()->id,
                'name' => 'Test person',
                'is_read' => false,
                'email' => 'test@person.com',
                'subject' => 'this is a subject',
                'message' => 'this is a message',
            ],
        ]);
    }

    /** @test */
    function it_can_show_an_entry()
    {
        $entry = $this->createFormEntry();

        $this->get('/api/formentries/' . $entry->id())
            ->seeJsonEquals([
                'data' => $this->includedEntry($entry),
            ]);
    }

    /** @test */
    function it_can_remove_an_entry()
    {
        $entry = $this->createFormEntry();

        $this->seeInDatabase(Contact::TABLE, [
            'id' => $entry->id(),
        ]);

        $this->delete('/api/formentries/' . $entry->id())
            ->assertNoContent();

        $this->notSeeInDatabase(Contact::TABLE, [
            'id' => $entry->id(),
        ]);
    }
}
