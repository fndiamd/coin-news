<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    private $auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $this->auth = auth()->user() ? (auth()->user()->user_role === 'admin') : false;

        if($this->auth === true)
            return $next($request);
            
        return redirect('login')->with('error', 'Access denied!');
    }
}
