<?php

use App\Pictures\Picture;
use App\Testing\DefaultIncludes;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticlePicturesTest extends \TestCase
{
    use DefaultIncludes, DatabaseTransactions;

    /** @test */
    function it_can_get_all_pictures_for_an_article()
    {
        $user = $this->createUser();
        $article = $this->createArticle(['user_id' => $user->id()]);
        $picture = $this->createPicture(['item_id' => $article->id()]);

        $this->get('/api/articles/' . $article->id() . '/pictures')
            ->seeJsonEquals([
                'data' => [
                    $this->includedPicture($picture),
                ],
            ]);
    }

    /** @test */
    function it_can_create_picture()
    {
        $user = $this->createUser();
        $article = $this->createArticle(['user_id' => $user->id()]);

        $this->post('/api/articles/' . $article->id() . '/pictures', [
            'path' => 'a_random_path',
        ])->seeJsonEquals([
            'data' => [
                'id' => DB::table(Picture::TABLE)->first()->id,
                'path' => 'a_random_path',
                'articleRelation' => [
                    'data' => $this->includedArticle($article),
                ]
            ]
        ]);
    }

    /** @test */
    function it_can_show_a_picture()
    {
        $user = $this->createUser();
        $article = $this->createArticle(['user_id' => $user->id()]);
        $picture = $this->createPicture(['item_id' => $article->id()]);

        $this->get('/api/articles/' . $article->id() . '/pictures/' . $picture->id())
            ->seeJsonEquals([
                'data' => $this->includedPicture($picture),
            ]);
    }

    /** @test */
    function it_can_remove_a_picture()
    {
        $user = $this->createUser();
        $article = $this->createArticle(['user_id' => $user->id()]);
        $picture = $this->createPicture(['item_id' => $article->id()]);

        $this->seeInDatabase(Picture::TABLE, ['id' => $picture->id()]);

        $this->delete('/api/articles/' . $article->id() . '/pictures/' . $picture->id())
            ->assertNoContent();

        $this->missingFromDatabase(Picture::TABLE, ['id' => $picture->id()]);
    }
}
