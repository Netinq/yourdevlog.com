<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportDataController extends Controller
{
    public function index($website_id)
    {
        $articles = Article::where('website_id', $website_id)->get();
        return view('data.data', compact('articles'));
    }
}
