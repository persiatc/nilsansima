<?php

namespace App\Http\Middleware;

use Closure;

class UpdateLastAction
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
        if (\Auth::check() == "true") {
            // Update Last Action TimeStamp In DataBase
            $now = time();
            $user = \Auth::user()->email;
            \DB::update("update users set lastAction = $now where email = ?", ["$user"]);
        }
        return $next($request);
    }
}
