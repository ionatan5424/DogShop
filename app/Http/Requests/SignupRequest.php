<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SignupRequest extends Request {

  
  public function authorize() {
    return true;
  }
  
  public function rules() {
    return [
       'name' => 'required|min:2|max:50|regex:/^[a-z]+(\s[a-z]+)*$/i',
       'email' => 'required|email|unique:users,email',
       'password' => 'required|min:6|max:15|confirmed'
    ];
  }
  
  public function messages(){
    return [
      'name.regex' => 'the name must contain only letters and spaces'  
    ];
  }
}

