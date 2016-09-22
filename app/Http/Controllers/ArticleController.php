<?php
namespace App\Http\Controllers;

use App\Articles\ArticleRepository;

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

        return view('articles.index', compact('articles'));
    }
}
