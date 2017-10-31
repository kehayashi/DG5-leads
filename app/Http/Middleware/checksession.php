<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class checksession {

    public function handle($request, Closure $next) {

      if(Session::has('id')){
          return $next($request);
      }
      else{
         return response()->view('form_login');
      }
    }
}
