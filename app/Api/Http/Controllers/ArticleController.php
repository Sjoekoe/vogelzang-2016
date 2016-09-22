<?php
namespace App\Api\Http\Controllers;

use App\Api\Articles\ArticleTransformer;
use App\Api\Http\Controller;
use App\Articles\Article;
use App\Articles\ArticleRepository;
use App\Articles\Requests\StoreArticleRequest;

class ArticleController extends Controller
{
    /**
     * @var \App\Articles\ArticleRepository
     */
    private $articles;

    public function __construct(ArticleRepository $articles)
    {
        $this->articles = $articles;
    }

    public function index()
    {
        $articles = $this->articles->findAllPaginated();

        return $this->response()->paginator($articles, new ArticleTransformer());
    }

    public function store(StoreArticleRequest $request)
    {
        $article = $this->articles->create($this->auth()->user(), $request->all());

        return $this->response()->item($article, new ArticleTransformer());
    }

    public function show(Article $article)
    {
        return $this->response()->item($article, new ArticleTransformer());
    }

    public function update(StoreArticleRequest $request, Article $article)
    {
        $article = $this->articles->update($article, $request->all());

        return $this->response()->item($article, new ArticleTransformer());
    }

    public function delete(Article $article)
    {
        $this->articles->delete($article);

        return $this->response()->noContent();
    }
}
