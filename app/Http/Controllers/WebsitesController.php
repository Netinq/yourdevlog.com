<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Website;
use App\Article;
use App\Type;

class WebsitesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $websites = Website::where('user_id', Auth::id())->get();
        foreach($websites as $website)
        {
            $website->articles = Article::where('website_id', $website->id)->count();
        }
        return view('website.home', compact('websites'));
    }

    public function create()
    {
        return view('website.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:35',
            'url' => 'required|url',
        ]);
        
        $website = new Website();
        $website->name = request('name');
        $website->url = request('url');
        $website->user_id = Auth::id();
 
        $website->save();
        return redirect()->home()->with('success', 'Site enregistré');
    }

    public function show($id)
    {
        $articles = Article::where('website_id', $id)->get();
        foreach($articles as $article)
        {
            $type = Type::where('article_id', $article->id)->first();
            $article->type = $type->name;
            $article->color = $type->color;
        }
        $website = Website::where('id', $id)->first();
        return view('website.show', compact('articles', 'website'));
    }

    public function edit($id)
    {
        $website = Website::where('id', $id)->first();
        return view('website.edit', compact('website'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'max:35',
            'url' => 'url|unique:websites',
        ]);
        
        $website = Website::find($id);
        $website->name = request('name');
        $website->url = request('url');
 
        $website->save();
        return redirect()->home()->with('success', 'Site update');
    }

    public function destroy($id)
    {
        Website::destroy($id);
        return redirect()->home()->with('success', 'Site supprimé');
    }
}
