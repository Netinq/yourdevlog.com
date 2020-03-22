<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Website;
use App\Collaborator;
use App\Article;
use App\Type;
use App\User;

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
        return redirect()->home()->with('success', $website->name.' has been created');
    }

    public function show($id)
    {
        $website = Website::where('id', $id)->first();
        $collaborators = Collaborator::where('website_id', $website->id)->get();
        $users = array();
        foreach($collaborators as $collaborator)
        {
            array_push($users, User::where('id', $collaborator->user_id)->first());
        }
        $website->collaborators = $users;
        if ($website->user_id != Auth::id()
        && 
        !Collaborator::where('website_id', $id)->where('user_id', Auth::id())->exists())
        {
            return redirect()->home()->with('error', 'You don\' have permission !');
        }
        $articles = Article::where('website_id', $id)->orderBy('created_at', 'desc')->get();
        foreach($articles as $article)
        {
            $type = Type::where('article_id', $article->id)->first();
            $article->type = $type->name;
            $article->color = $type->color;
            $article->date = $article->created_at->format('d/m/y');
        }
        return view('website.show', compact('articles', 'website'));
    }

    public function edit($id)
    {
        $website = Website::where('id', $id)->first();
        if ($website->user_id != Auth::id()){
            return redirect()->home()->with('error', 'You don\' have permission !');
        }
        return view('website.edit', compact('website'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'max:35',
            'url' => 'url',
        ]);
        $website = Website::find($id);
        if ($website->user_id != Auth::id()){
            return redirect()->home()->with('error', 'You don\' have permission !');
        }
        $website->name = request('name');
        $website->url = request('url');
 
        $website->save();
        return redirect()->home()->with('success', $website->name.' has been updated');
    }

    public function destroy($id)
    {
        $website = Website::where('id', $id)->first();
        if ($website->user_id != Auth::id()){
            return redirect()->home()->with('error', 'You don\' have permission !');
        }
        Website::destroy($id);
        return redirect()->home()->with('success', $website->name.' has been deleted');
    }
}
