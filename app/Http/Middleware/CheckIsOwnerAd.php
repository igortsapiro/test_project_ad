<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsOwnerAd
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
        $ad = $request->route('ad');
        $user = auth()->user();
        if ($ad->user_id != $user->id) {
            return redirect()->route('index')->withErrors('You can not edit or delete this Ad');
        }
        return $next($request);
    }
}
