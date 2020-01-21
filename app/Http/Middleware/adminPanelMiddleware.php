<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class adminPanelMiddleware
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
        $session = Auth::user();

        if($session == null){
            abort(401);
        }else if($session->hasRole('admin')){
            return $next($request);
        };

        return redirect()->route('home');
    }
}
