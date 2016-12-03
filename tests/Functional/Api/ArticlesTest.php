<?php

use App\Articles\Article;
use App\Testing\DefaultIncludes;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticlesTest extends \TestCase
{
    use DefaultIncludes, DatabaseTransactions;

    /** @test */
    public function it_can_get_all_articles_paginated()
    {
        $user = $this->createUser();
        $article = $this->createArticle(['user_id' => $user->id()]);

        $this->get('/api/articles')
            ->seeJsonEquals([
                'data' => [
                    $this->includedArticle($article),
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
    public function it_can_create_an_article()
    {
        $user = $this->loginAsUser();

        $this->post('/api/articles', [
            'title' => 'Foo title',
            'message' => 'Foo Message',
        ])->seeJsonEquals([
            'data' => [
                'message' => 'Foo Message',
                'title' => 'Foo title',
                'id' => DB::table(Article::TABLE)->first()->id,
                'created_at' => Carbon::now()->toIso8601String(),
                'userRelation' => [
                    'data' => $this->includedUser($user),
                ],
            ],
        ]);
    }

    /** @test */
    public function it_can_show_a_message()
    {
        $user = $this->createUser();
        $article = $this->createArticle([
            'user_id' => $user->id(),
        ]);

        $this->get('/api/articles/' . $article->id())
            ->seeJsonEquals([
                'data' => $this->includedArticle($article),
            ]);
    }

    /** @test */
    public function it_can_update_an_article()
    {
        $user = $this->createUser();
        $article = $this->createArticle([
            'user_id' => $user->id(),
        ]);

        $this->put(
            '/api/articles/' . $article->id(), [
                'title' => 'Updated title',
                'message' => 'updated message',
            ]
        )->seeJsonEquals(
            [
                'data' => $this->includedArticle(
                    $article, [
                        'title' => 'Updated title',
                        'message' => 'updated message',
                    ]
                ),
            ]
        );
    }

    /** @test */
    public function it_can_remove_an_article()
    {
        $user = $this->createUser();
        $article = $this->createArticle(
            [
                'user_id' => $user->id(),
            ]
        );

        $this->seeInDatabase(
            Article::TABLE, [
                'id' => $article->id(),
            ]
        );

        $this->delete('/api/articles/' . $article->id())
            ->assertNoContent();

        $this->missingFromDatabase(Article::TABLE, [
            'id' => $article->id(),
        ]);
    }
}
