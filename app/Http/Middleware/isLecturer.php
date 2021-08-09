<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class isLecturer
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
        if (Auth::user()->isLecturer() || Auth::user()->isAdmin()) {
            return $next($request);
        }
        $message = __('Нямате достъп до този ресурс!');
        return redirect()->back()->with('error', $message);
    }
}
