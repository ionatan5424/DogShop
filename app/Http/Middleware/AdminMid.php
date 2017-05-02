<?php 

/*Every MiddleWare you will have to enter it in the Kernel*/

namespace App\Http\Middleware;

use Closure;
use Session;

class AdminMid {
  
    public function handle($request, Closure $next){
      
      if( ! session::has('is_admin') ){ 
        
        return redirect('user/signin');
        
      } else {
        
        return $next($request); 
        
      }
      
    }
}
