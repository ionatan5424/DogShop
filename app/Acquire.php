<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart;
use Session;


class Acquire extends Model {

  static public function getAcquires($category_url, &$data) {
    
    $data['acquires'] = [];
    
    if ($category = Categorie::where('url', '=', $category_url)->first()) {

      $category = $category->toArray();

      $data['title'] = $data['title'] . ' | ' . $category['title'] . ' dogs';
      $data['cat_title'] = $category['title'] . ' dogs';
      $data['cat_url'] = $category_url;

      if ($acquires = Categorie::find($category['id'])->acquires) {

        $data['acquires'] = $acquires->toArray();
      }
    }
  }

  static public function getItem($acquire_url, &$data) {
    
    $data['item'] = [];
    if ($acquire = self::where('url', '=', $acquire_url)->first()) {

      $data['item'] = $acquire->toArray();
      $data['title'] = $data['title'] . ' | ' . $data['item']['title'];
    }
  }

  static public function cartAdd($acquire_id){
    
    if(is_numeric($acquire_id) && !Cart::get($acquire_id) ){
     
     if( $acquire = self::find($acquire_id )){
       $acquire = $acquire->toArray();
       Cart::add($acquire_id, $acquire['title'], $acquire['price'], 1, []);
       Session::flash('sm', 'The ' .$acquire['title'] . ' has been added to your cart');
     }   
    }
  }
  
  static public function updateCart($request){
    
    if(!empty($request['id'])){
      
      if($acquire = Cart::get($request['id'])){
        
        $acquire = $acquire->toArray();
        
        if(!empty($request['op'])){
         
          if($request['op'] == 'plus'){
         
          Cart::update($request['id'], [ 'quantity' => 1, ]);  
            
          }elseif($request['op'] == 'minus') {
            
              if($acquire['quantity'] -1 == 0){
                
                  Cart::remove($request['id']);
                
              }else {
                
                Cart::update($request['id'], [ 'quantity' => -1, ]);
                
              }
          }
        }
      }
    }
  }

  static public function saveAcquire($request){
    
    $image_name = 'default-no-images.png';

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
      $file = $request->file('image');
      $image_name = date('Y.m.d.H.m.s') . '-' . $file->getClientOriginalName();
      $request->file('image')->move(public_path() . '/images', $image_name); {
        
      }
    }
    
    $acquire = new self();
    $acquire->title = $request['title'];
    $acquire->article = $request['article'];
    $acquire->url = $request['url'];
    $acquire->image = $image_name;
    $acquire->price = $request['price'];
    $acquire->categorie_id = $request['categorie_id'];
    $acquire->save();
    Session::flash('sm','Your dog has been saved!');
  }
  
  static public function updatAcquire($request, $id){
    
    $image_name = '';

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
      $file = $request->file('image');
      $image_name = date('Y.m.d.H.m.s') . '-' . $file->getClientOriginalName();
      $request->file('image')->move(public_path() . '/images', $image_name);
    }
    
    $acquire = self::find($id);
    $acquire->title = $request['title'];
    $acquire->article = $request['article'];
    $acquire->url = $request['url'];
    if($image_name) {
      $acquire->image = $image_name;
    }
    $acquire->price = $request['price'];
    $acquire->categorie_id = $request['categorie_id'];
    $acquire->save();
    Session::flash('sm','Your dog has been updated!');
    
    
  }

}
