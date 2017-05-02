<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart;
use Session;
use DB;

class Order extends Model {

  /*the following static function will take place anytime a user logs in correctly and selects items for purchase*/
  static public function saveOrder() {

    $cartCollection = Cart::getContent();
    $order = new self();
    $order->user_id = Session::get('user_id');
    $order->data = $cartCollection->toJson(); /*dispays and saves what user has ordered*/
    $order->total = Cart::getTotal();
    $order->save(); /* elequent orm automatically registers updated_at & created_at - so no need to add manually */
    Cart::clear();
    Session::flash('sm', 'Your order is saved!');
  }

  static public function getAllOrders(){
    $sql = "SELECT o.*,DATE_FORMAT(o.created_at,'%e/%m/%Y %H:%i:%s') ca, u.name FROM orders o "
            . "JOIN users u ON u.id = o.user_id "
            . "ORDER BY o.created_at DESC";
    return DB::select($sql);
    
  }
  
}
