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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $websites = Website::where('user_id', Auth::id())->get();
        $types = Type::where('user_id', null)->get();
        return view('article.create', compact('websites', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:35',
            'type' => 'required',
            'version' => 'required|max:50',
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
        
        return redirect('home')->with('success', 'Article enregistré');
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
        $article->type_id = request('type_id');
        $article->content = request('content');
 
        $article->save();
        return redirect()->home()->with('success', 'Article update');
    }

    public function destroy($id)
    {
        Article::destroy($id);
        return redirect()->home()->with('success', 'Article supprimé');
    }
}
