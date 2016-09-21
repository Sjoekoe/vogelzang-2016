<?php
namespace App\Http\Middleware;

use Closure;

class Admin
{
    public function handle($request, Closure $next)
    {
        if (! auth()->check()) {
            return redirect()->guest('login');
        }

        if (auth()->check() && ! auth()->user()->isAdmin()) {
            abort(403);
        }

        return $next($request);
    }
}
