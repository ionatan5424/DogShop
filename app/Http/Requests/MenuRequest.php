<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class MenuRequest extends Request {

  
  public function authorize() {
    return true;
  }
  
  public function rules() {
    
    $all = Input::all();
    $menu_id = isset($all['menu_id']) ? ',' . $all['menu_id'] : '';
    
    return [
       'link' => 'required',
       'url' => 'required|unique:menus,url' . $menu_id,
       'title' => 'required'
    ];
  }

}
