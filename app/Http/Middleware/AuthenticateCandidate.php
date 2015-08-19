<?php

namespace employment_bank\Http\Middleware;

use Closure;
use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class AuthenticateCandidate{
     /**
      * The Guard implementation.
      *
      * @var Guard
      */
     protected $auth;
     /**
      * Create a new filter instance.
      *
      */
     public function __construct(){

         $this->auth = Auth::candidate();
     }

    public function handle($request, Closure $next){
      if ($this->auth->guest()){

          if ($request->ajax())
              return response('Unauthorized.', 401);
          else
              return redirect()->guest('/login');
      }
      return $next($request);
    }
}
