<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LastSeenMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            User::where('id', Auth::id())
                ->update(['last_seen' => now()]);
        }

        return $next($request);
    }
}
