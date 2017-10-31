<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class checkcargo {

    public function handle($request, Closure $next) {

      if(Session::has('id')){
          $cargo = Session::get('cargo');
          if($cargo == 'diretor'){
              return $next($request);
          }
          else{
              return response()->view('aviso');
          }
      }

    }
}
