<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class CategoryRequest extends Request {

  
  public function authorize() {
    return true;
  }
  
  public function rules() {
    
    $all = Input::all();
    $category_id = isset($all['category_id']) ? ',' . $all['category_id'] : '';
    //$image_validate = ($category_id) ? 'image' : 'required|image'; -- image validation
    
    return [
       'title' => 'required',
       'url' => 'required|unique:categories,url' . $category_id,
       'image' => 'image',
       //'image' => $image_validate
    ];
  }

}


