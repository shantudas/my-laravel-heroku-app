<?php

namespace App\Http\Controllers;

use App\Article;
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
        $articles = Article::with(['user'])->paginate(5);
        return ArticleResource::collection($articles);
    }
}
