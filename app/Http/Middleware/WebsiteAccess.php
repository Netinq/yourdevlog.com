<?php

namespace App\Http\Middleware;
use App\Collaborator;
use Illuminate\Support\Facades\Auth;

use Closure;

class WebsiteAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->project_id == null)
        {
            return $next($request);
        } else {
            return route('isn.home');
        }
    }
}
