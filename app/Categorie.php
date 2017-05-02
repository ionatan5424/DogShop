<?php

namespace App;

use Session;
use DB;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model {

    public function acquires() {
    return $this->hasMany('App\Acquire');
  }

  static public function saveCategory($request) {
    
    $image_name = 'default-no-images.png';
    
    if ($request->hasFile('image') && $request->file('image')->isValid() ) {
        $file = $request->file('image');
        $image_name = date('Y.m.d.H.m.s') . '-' . $file->getClientOriginalName();
        $request->file('image')->move(public_path() . '/images' , $image_name);
      {
    }
      
    }
    
    $category = new self();
    $category->title = $request['title'];
    $category->article = $request['article'];
    $category->url = $request['url'];
    $category->image = $image_name;
    $category->save();
    Session::flash('sm', 'category has been saved!');
    
  }
          
  static public function updateCategory($request, $id) {
    
    $image_name = '';
    
    if ($request->hasFile('image') && $request->file('image')->isValid() ) {
        $file = $request->file('image');
        $image_name = date('Y.m.d.H.m.s') . '-' . $file->getClientOriginalName();
        $request->file('image')->move(public_path() . '/images' , $image_name);
    }
    
    $category = self::find($id);
    $category->title = $request['title'];
    $category->article = $request['article'];
    $category->url = $request['url'];
    
    // if you want to edit the image and an image was there previously
    if($image_name){
      $category->image = $image_name;
    }
    
    $category->save();
    Session::flash('sm', 'Category has been updated!');
    
  }
  
  static public function getAllOrdered($categorie_id){
    $sql = "SELECT * FROM categories "
        . "ORDER BY CASE WHEN id = $categorie_id THEN 0 ELSE id END";
   return DB::select($sql);
  }
  
}
