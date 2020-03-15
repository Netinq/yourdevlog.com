<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Type;
use App\Website;

class ExportDataController extends Controller
{
    public function show($id)
    {
        $articles = Article::where('website_id', $id)->get();
        $articles->orderBy('created_at', 'desc');
        foreach($articles as $article)
        {
            $type = Type::where('article_id', $article->id)->first();
            $article->type = $type->name;
            $article->color = $type->color;
            $website_data = Website::where('id', $article->website_id)->first();
            $article->website_name = $website_data->name;
            $article->date = $article->created_at->format('d/m/y');
        }
        return view('data', compact('articles'));
    }
}
