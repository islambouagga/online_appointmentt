<?php

namespace App\Http\Middleware;

use Closure;

class CheckApproved
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

        if (auth()->check() && auth()->user()->approved == 'request' ){
            auth()->logout();
            $message = 'Your Account not approved yet ';
            return redirect()->route('login')->withMessage($message);
        }
        return $next($request);
    }
}
