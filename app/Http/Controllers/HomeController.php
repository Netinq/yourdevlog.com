<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Website;
use App\Article;
use App\Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        return view('home', compact('websites'));
    }
}
