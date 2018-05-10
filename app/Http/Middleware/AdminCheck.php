<?php

namespace App\Http\Middleware;

use Closure;

class AdminCheck
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
        $user_type = auth()->user()->type ?? null;
        if ($user_type && $user_type=='admin') {
            return $next($request);
        }else {
            return redirect('/home')->withErrors(["شما به این بخش دسترسی دارید."]);
        }
    }
}
