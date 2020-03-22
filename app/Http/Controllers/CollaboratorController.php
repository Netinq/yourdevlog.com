<?php

namespace App\Http\Controllers;

use App\Collaborator;
use App\User;
use App\Website;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $website = Website::where('id', request('website_id'))->first();
        if ($website->user_id != Auth::id())
        {
            return redirect()->route('websites.show', request('website_id'))->with('error', 'You don\' have permission !');
        }
        if (!User::where('email', request('email'))->first()->exists())
        {
            return redirect()->route('websites.show', request('website_id'))->with('error', 'Email invalid');
        }
        $user = User::where('email', request('email'))->first();
        if (Collaborator::where('website_id', request('website_id'))->where('user_id', $user->id)->exists())
        {
            return redirect()->route('websites.show', request('website_id'))->with('error', 'Collaborator allready exist');
        }
        $collaborator = new Collaborator();
        $collaborator->user_id = $user->id;
        $collaborator->website_id = request('website_id');
        // $collaborator->permission = request('permission');
        $collaborator->save();
        return redirect()->route('websites.show', request('website_id'))->with('success', 'Collaborator added');
    }
    public function update(Request $request, Collaborator $collaborator)
    {
        //
    }

    public function destroy($id, $website_id)
    {
        $collaborator = Collaborator::where('user_id', $id)->where('website_id', $website_id)->first();
        $website = Website::where('id', $collaborator->website_id)->first();
        if ($website->user_id != Auth::id())
        {
            return redirect()->route('websites.show', $collaborator->website_id)->with('error', 'You don\' have permission !');
        }
        Collaborator::destroy($collaborator->id);
        return redirect()->route('websites.show', $collaborator->website_id)->with('success', 'Collaborator has been remove');
    }
}
