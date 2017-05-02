<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class ContentRequest extends Request {

  
  public function authorize() {
    return true;
  }
  
  public function rules() {
   
    return [
       'menu' => 'required',
       'title' => 'required',
    ];
  }

}

