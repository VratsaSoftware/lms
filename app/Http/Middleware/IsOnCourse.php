<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class IsOnCourse
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
        if ($request->route()->user->id == Auth::user()->id && Auth::user()->isOnThisCourse($request->route()->course->id) || Auth::user()->isAdmin() || Auth::user()->isLecturer()) {
            return $next($request);
        }
        $message = __('Нямате право да достъпите този ресурс!');
        return redirect()->route('profile')->with('error', $message);
    }
}
