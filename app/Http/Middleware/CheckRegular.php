<?php

namespace App\Http\Middleware;

use Closure;

class CheckRegular
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
        if ($user_type && $user_type=='regular') {
            return $next($request);
        }else {
            return redirect('/home')->withErrors(["فقط کاربران عادی به این بخش دسترسی دارند."]);
        }
    }
}
