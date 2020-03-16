<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Website;
use App\Type;
use App\Article;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return route('home');
    }

    public function create()
    {
        $websites = Website::where('user_id', Auth::id())->get();
        $types = Type::where('user_id', null)->get();
        return view('article.create', compact('websites', 'types'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:35',
            'type' => 'required',
            'version' => 'max:50',
            'content' => 'required',
        ]);
        
        $article = new article();
        $article->name = request('name');
        $article->website_id = request('website_id');
        $article->content = request('content');
        $article->version = request('version');
        $article->save();

        $type = new Type();
        $type->user_id = Auth::id();
        $type->article_id = $article->id;
        $type->name = request('type');
        $type->color = request('type_color');
        $type->save();
        
        return redirect()->route('websites.show', $article->website_id)->with('success', 'An article has been article was created');
    }

    public function show($id)
    {
        $articles = Article::find($id)->first();
        return view('article.show', compact('articles'));
    }

    public function edit($id)
    {
        $article = Article::where('id', $id)->first();
        $website = Website::where('id', $article->website_id)->first();
        $type = Type::where('article_id', $article->id)->first();
        $article->type = $type->name;
        $article->color = $type->color;
        $article->date = $article->created_at->format('d/m/y');
        return view('article.edit', compact('article', 'website'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:35',
            'content' => 'required',
        ]);
        
        $article = Article::find($id);
        $article->name = request('name');
        $article->website_id = request('website_id');
        $article->content = request('content');
        $article->version = request('version');
        $article->save();

        $type = Type::where('article_id', $id);
        $type->name = request('type');
        $type->color = request('type_color');
        $type->save();
 
        $article->save();
        return redirect()->route('websites.show', $article->website_id)->with('success', 'An article has been article was updated');
    }

    public function destroy($id)
    {
        $article = Article::where('id', $id)->first();
        Article::destroy($id);
        return redirect()->route('websites.show', $article->website_id)->with('success', 'An article has been article was deleted');
    }
}
