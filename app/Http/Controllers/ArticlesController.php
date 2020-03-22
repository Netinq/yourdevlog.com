<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Website;
use App\Type;
use App\ProjetsLink;
use App\Article;
use App\Collaborator;

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

    public function createid($id)
    {
        if (Auth::user()->project_id != null)
        {
            return redirect()->route('isn.create');
        }
        $websites = Website::where('user_id', Auth::id())->get();
        $collaborators_id = Collaborator::where('user_id', Auth::id())->get();
        $websites_col = array();
        foreach($collaborators_id as $colid)
        {
            array_push($websites_col, Website::where('id', $colid->website_id)->first());
        }
        foreach($websites as $website)
        {
            if ($website->id == $id) $website->select = true;
            else $website->select = false;
        }
        foreach($websites_col as $website)
        {
            if ($website->id == $id) $website->select = true;
            else $website->select = false;
        }
        $types = Type::where('user_id', null)->get();
        return view('article.create', compact('websites', 'types', 'websites_col'));
    }

    public function create()
    {
        if (Auth::user()->project_id != null)
        {
            return redirect()->route('isn.create');
        }
        $websites = Website::where('user_id', Auth::id())->get();
        $collaborators_id = Collaborator::where('user_id', Auth::id())->get();
        $websites_col = array();
        foreach($collaborators_id as $colid)
        {
            array_push($websites_col, Website::where('id', $colid->website_id)->first());
        }
        $types = Type::where('user_id', null)->get();
        return view('article.create', compact('websites', 'types', 'websites_col'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:35',
            'type' => 'required',
            'version' => 'max:50',
            'content' => 'required',
        ]);
        $website = Website::where('id', request('website_id'))->first();
        if ($website->user_id != Auth::id()
        && 
        !Collaborator::where('website_id', request('website_id'))->where('user_id', Auth::id())->exists())
        {
            return redirect()->home()->with('error', 'You don\' have permission !');
        }
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
        if ($website->user_id != Auth::id()
        && 
        !Collaborator::where('website_id', $article->website_id)->where('user_id', Auth::id())->exists())
        {
            return redirect()->home()->with('error', 'You don\' have permission !');
        }
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
            'type' => 'required',
            'version' => 'max:50',
            'content' => 'required',
        ]);
        $website = Website::where('id', request('website_id'))->first();
        if ($website->user_id != Auth::id()
        && 
        !Collaborator::where('website_id', $id)->where('user_id', Auth::id())->exists())
        {
            return redirect()->home()->with('error', 'You don\' have permission !');
        }
        $article = Article::find($id);
        $article->name = request('name');
        $article->website_id = request('website_id');
        $article->content = request('content');
        $article->version = request('version');
        $article->save();

        $type = Type::where('article_id', $id)->first();
        $type->name = request('type');
        $type->color = request('type_color');
        $type->save();

        return redirect()->route('websites.show', $article->website_id)->with('success', 'An article has been article was updated');
    }

    public function destroy($id)
    {
        $article = Article::where('id', $id)->first();
        $website = Website::where('id', $article->website_id)->first();
        if ($website->user_id != Auth::id()
        && 
        !Collaborator::where('website_id', $id)->where('user_id', Auth::id())->exists())
        {
            return redirect()->route('websites.show', $article->website_id)->with('error', 'You don\' have permission !');
        }
        Article::destroy($id);
        return redirect()->route('websites.show', $article->website_id)->with('success', 'An article has been article was deleted');
    }
}
