<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            if(Auth::User()->is_role == 1)
            {
                return $next($request);
            }
            else
            {
                Auth::logout();
                return redirect(url('/'));
            }
        }
        else
        {
            Auth::logout();
            return redirect(url('/'));
        }
    }
}
