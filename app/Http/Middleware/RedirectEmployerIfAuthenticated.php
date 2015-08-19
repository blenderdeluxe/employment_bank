<?php

namespace employment_bank\Http\Middleware;

use Closure;
use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Auth;
class RedirectEmployerIfAuthenticated{

    protected $auth;

    public function __construct(){

        $this->auth = Auth::employer();
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
            return redirect()->route('employer.home');
        }

        return $next($request);
    }
}
