<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsAuth
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
        $user = auth()->user();
        if (empty($user)) {
            return redirect()->route('index')->withErrors('You are not identified');
        }
        return $next($request);
    }
}
