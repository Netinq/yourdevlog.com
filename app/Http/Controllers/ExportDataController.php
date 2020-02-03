<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ExportDataController extends Controller
{
    public function show($id)
    {
        $articles = Article::where('website_id', $id)->get();
        return view('data', compact('articles'));
    }
}
