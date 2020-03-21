<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Website;
use App\Article;
use App\Config;
use App\Collaborator;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->project_id != null)
        {
            return redirect()->route('isn.home');
        }
        $websites = Website::where('user_id', Auth::id())->get();
        foreach($websites as $website)
        {
            $website->articles = Article::where('website_id', $website->id)->count();
        }
        $collaborators_id = Collaborator::where('user_id', Auth::id())->get();
        $websites_col = array();
        foreach($collaborators_id as $colid)
        {
            array_push($websites_col, Website::where('id', $colid->website_id)->first());
        }
        return view('home', compact('websites', 'websites_col'));
    }
}
