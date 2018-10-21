<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Resources\ArticleDetailsResource;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $articles = Article::paginate(5);
        return ArticleResource::collection($articles);
    }

    public function show($id)
    {
        $article = Article::find($id);
        return new ArticleDetailsResource($article);
    }
}
