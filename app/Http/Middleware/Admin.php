<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->level != 'admin')
        {
            abort(403, 'Access Not Found');
        }
        return $next($request);
    }
}
