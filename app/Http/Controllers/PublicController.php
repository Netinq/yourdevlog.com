<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Website;
use App\Article;
use App\Config;
use App\Type;

class PublicController extends Controller
{
    public function devlog()
    {
        $data_url = Config::where('name', 'devlog')->first();
        $data_url = $data_url->value_str;
        $articles = Article::where('website_id', $data_url)->orderBy('created_at', 'desc')->get();
        foreach($articles as $article)
        {
            $type = Type::where('article_id', $article->id)->first();
            $article->type = $type->name;
            $article->color = $type->color;
            $website_data = Website::where('id', $article->website_id)->first();
            $article->website_name = $website_data->name;
            $article->date = $article->created_at->format('d/m/y');
        }
        return view('devlog', compact('data_url', 'articles'));
    }
}
