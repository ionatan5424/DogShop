<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class ProductRequest extends Request {

  
  public function authorize() {
    return true;
  }
  
  public function rules() {
    
    $all = Input::all();
    $acquire_id = isset($all['acquire_id']) ? ',' . $all['acquire_id'] : '';
    
    return [
       'categorie_id' => 'required', 
       'title' => 'required',
       'url' => 'required|unique:acquires,url' . $acquire_id,
       'price' => 'required|numeric',
       'image' => 'image'
    ];
  }

}




