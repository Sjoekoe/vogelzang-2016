<?php
namespace App\Http\Middleware;

use Closure;

class Owner
{
    public function handle($request, Closure $next)
    {
        if (! auth()->check()) {
            return redirect()->guest('login');
        }

        if (auth()->check() && ! auth()->user()->isOwner()) {
            abort(403);
        }

        return $next($request);
    }
}
