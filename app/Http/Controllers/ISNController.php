<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Website;
use App\ProjetsLink;
use App\Type;
use App\Article;
use Illuminate\Support\Facades\Auth;


class ISNController extends Controller
{
    public function login ()
    {
        return view('isn.auth.login');
    }
    public function register ()
    {
        return view('isn.auth.register');
    }
    public function global ()
    {
        $websites = Website::where('is_isn', true)->get();
        foreach($websites as $website)
        {
            $project = ProjetsLink::where('name', $website->name)->first();
            $website->students = $project->students;
            $articles = Article::where('website_id', $website->id)->orderBy('created_at', 'desc')->get();
            $users = array();
            foreach($articles as $article)
            {
                $type = Type::where('article_id', $article->id)->first();
                if (!(in_array($type->name, $users))) array_push($users, $type->name);
            }
            $website->users = $users;
        }
        return view('isn.global', compact('websites', 'users'));
    }
    public function home()
    {
        $website_data = ProjetsLink::where('id', Auth::user()->project_id)->first();
        $website = Website::where('name', $website_data->name)->first();
        $articles = Article::where('website_id', $website->id)->orderBy('created_at', 'desc')->get();
        foreach($articles as $article)
        {
            $type = Type::where('article_id', $article->id)->first();
            $article->type = $type->name;
            $article->color = $type->color;
            $article->date = $article->created_at->format('d/m/y');
        }
        return view('isn.home', compact('website', 'articles'));
    }
    public function create()
    {
        $website_data = ProjetsLink::where('id', Auth::user()->project_id)->first();
        $website = Website::where('name', $website_data->name)->first();
        $user = Auth::user()->name;
        return view('isn.article.create', compact('website', 'user'));
    }
    public function view($id)
    {
        $website = Website::where('id', $id)->first();
        $project = ProjetsLink::where('name', $website->name)->first();
        $articles = Article::where('website_id', $id)->orderBy('created_at', 'desc')->get();
        foreach($articles as $article)
        {
            $type = Type::where('article_id', $article->id)->first();
            $article->type = $type->name;
            $article->color = $type->color;
            $website_data = Website::where('id', $article->website_id)->first();
            $article->website_name = $website_data->name;
            $article->date = $article->created_at->format('d/m/y');
        }
        return view('isn.view', compact('articles', 'project'));
    }
    public function byUser($id, $name)
    {
        $website = Website::where('id', $id)->first();
        $project = ProjetsLink::where('name', $website->name)->first();
        $articles = Article::where('website_id', $id)->orderBy('created_at', 'desc')->get();
        $count = 0;
        foreach($articles as $article)
        {
            $type = Type::where('article_id', $article->id)->first();
            if ($type->name != $name)
            {
                unset($articles[$count]);
            } else {
                $article->type = $type->name;
                $article->color = $type->color;
                $website_data = Website::where('id', $article->website_id)->first();
                $article->website_name = $website_data->name;
                $article->date = $article->created_at->format('d/m/y');
            }
            $count++;
        }
        return view('isn.view', compact('articles', 'project'));
    }
}
