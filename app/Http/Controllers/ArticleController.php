<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Resources\ArticleDetailsResource;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function index()
    {
        $articles = Article::paginate(10);
        return ArticleResource::collection($articles);
    }

    public function show($id)
    {
        $article = Article::find($id);
        return new ArticleDetailsResource($article);
    }

    public function store(Request $request)
    {
        $article = Article::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return new ArticleDetailsResource($article);
    }

}
