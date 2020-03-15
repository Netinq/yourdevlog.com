<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', Auth::id())->first();
        return view('user.index', compact('user'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $user = User::where('id', Auth::id())->first();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (request('name') != $user->name)
        {
            $this->validate($request,[
                'name' => ['string', 'max:255'],
            ]);
        }
        if (request('email') != $user->email)
        {
            $this->validate($request,[
                'email' => ['email', 'max:255', 'unique:users'],
            ]);
        }
        
        $user->name = request('name');
        $user->email = request('email');
 
        $user->save();
        return redirect()->route('users.index')->with('success', $user->name.' has been updated');
    }

    public function destroy($id)
    {
        User::destroy($id);
        Auth::logout();
    }
}
