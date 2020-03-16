<?php

namespace App\Http\Controllers;

use App\Draft;
use Illuminate\Http\Request;

class DraftController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:35',
            'type' => 'required',
            'version' => 'max:50',
            'content' => 'required',
        ]);
        
        $article = new drat();
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

    public function destroy($id)
    {
        $article = Article::where('id', $id)->first();
        Article::destroy($id);
        return redirect()->route('websites.show', $article->website_id)->with('success', 'An article has been article was deleted');
    }
}
