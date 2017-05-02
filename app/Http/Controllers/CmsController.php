<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Content;
use App\Order;

class CmsController extends MainController {
  /*the function below overrides the sons attributes*/
  
    function __construct() {
    parent::__construct();
    $this->middleware('adminLogged');
  }
  
  public function getDashboard(){
    
    return view('cms.dashboard' , self::$data);
   
  }
  
  public function getOrders() {
   
    self::$data['orders'] = Order::getAllOrders();
    return view('cms.orders', self::$data);
    
    //echo __METHOD__; - to see how the pages connect from controller to browser
    //dd(self::$data); - like print_r for Laravel
  }
  
}


