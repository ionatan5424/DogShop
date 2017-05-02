<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class UserMid {
  
    public function handle($request, Closure $next){
      
      /*if user is logged in, take him to home page*/
      
      if( session::has('user_id') ){ 
        return redirect('');
        
      } else {
        
        return $next($request); /*not connected, so allow him to go where he wanted*/
        /*Every MiddleWare you will have to enter it in the Kernel*/
      }
      
    }
}
