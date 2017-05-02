<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Categorie;
use App\Acquire;
use App\Order;
use App\Menu;
use App\Json;
use Cart;
use Session;

class ShopController extends MainController {

  public function categories() {
    
    self::$data['title'] = self::$data['title'] . ' | shop categories';
    self::$data['categories'] = Categorie::all()->toArray();
    return view('content.categories', self::$data);
  }
  
  public function acquires($category_url) {
    Acquire::getAcquires($category_url, self::$data);
    return view('content.acquires', self::$data);
  }

  public function getJson() {
    self::$data['json'] = Json::getJson();
    return view('content.json', self::$data);
  }

  public function item($category_url, $acquire_url) {

    Acquire::getItem($acquire_url, self::$data);
    return view('content.item', self::$data);
  }

  public function checkout(){
    self::$data['title'] = self::$data['title'] . ' | Checkout page';
    $cartCollection = Cart::getContent();
    $cart_all = $cartCollection->toArray();
    sort($cart_all);
    self::$data['cart'] = $cart_all;
    return view('content.checkout', self::$data);
    
  }
  
  public function addToCart(Request $request){
    if(isset($request['acquire_id'])) {
    Acquire::cartAdd($request['acquire_id']);
    }
  }
  
  public function cartClear(){
    Cart::clear();
    return redirect('shop/checkout');
  }
  
  public function updateCart(Request $request){
    Acquire::updateCart($request);
  }
  
  public function saveOrder(){
    
    if ( Cart::isEmpty() ){
      
      return redirect('shop/checkout');
      
             
    } elseif (!Session::has('user_id')) {
      /* if user is not logged in redirect him to signin page */

      Session::flash('sm', 'Please Sign in before you purchase your pet');
      return redirect('user/signin?des=shop/checkout');
    } else {

      Order::saveOrder();
      return redirect('shop');
    }
  }

}
