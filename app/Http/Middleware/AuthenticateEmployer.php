<?php

namespace employment_bank\Http\Middleware;

use Closure;
use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class AuthenticateEmployer{
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

         $this->auth = Auth::employer();
     }

    public function handle($request, Closure $next){
      if ($this->auth->guest()){

          if ($request->ajax())
              return response('Unauthorized.', 401);
          else
              return redirect()->guest('employer/login');
      }
      return $next($request);
    }
}
