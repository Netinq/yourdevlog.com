<?php

namespace App\Http\Middleware;

use Closure;
use App\ProjetsLink;
use Illuminate\Support\Facades\Auth;

class ISN
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
