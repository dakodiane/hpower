<?php
namespace App\Http\Middleware;

use Closure;

class CheckPermanentAccess
{
    public function handle($request, Closure $next)
    {
        if ($request->cookie('permanent_access')) {
            // Grant access because the user has chosen permanent access
            return $next($request);
        }

        // Otherwise, redirect or handle as needed
        return redirect('/permission-denied');
    }
}
