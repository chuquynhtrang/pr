<?php

namespace App\Http\Middleware;

use Closure;

class TeacherAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isTeacher()) {
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
