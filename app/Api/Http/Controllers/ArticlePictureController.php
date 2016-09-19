<?php
namespace App\Api\Http\Controllers;

use App\Api\Http\Controller;
use App\Api\Pictures\PictureTransformer;
use App\Articles\Article;
use App\Pictures\Picture;
use App\Pictures\PictureRepository;
use Illuminate\Http\Request;

class ArticlePictureController extends Controller
{
    /**
     * @var \App\Pictures\PictureRepository
     */
    private $pictures;

    public function __construct(PictureRepository $pictures)
    {
        $this->pictures = $pictures;
    }

    public function index(Article $article)
    {
        $pictures = $this->pictures->findAllForArticle($article);

        return $this->response()->collection($pictures, new PictureTransformer());
    }

    public function store(Request $request, Article $article)
    {
        $picture = $this->pictures->create($article, $request->all());

        return $this->response()->item($picture, new PictureTransformer());
    }

    public function show(Article $article, Picture $picture)
    {
        return $this->response()->item($picture, new PictureTransformer());
    }
    
    public function delete(Article $article, Picture $picture)
    {
        $this->pictures->delete($picture);
        
        return $this->response()->noContent();
    }
}
