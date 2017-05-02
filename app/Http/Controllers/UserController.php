<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\User;
use Session;

class UserController extends MainController {
  /*__construct: you are telling Laravel to enter the Kernel UserMid to work on all of the function below/if user is logged in rules*/
   function __construct() {
   parent::__construct(); /*Father to override the son's attributes*/
   
   $this->middleware('userLogged', ['except'=> ['getLogout','getProfile']]);
   /* except tell us which method u want the parent constructor to NOT affect, since if we left it like this user could not logout.. would effect logout()method*/
  }
  
  public function getSignin(){
   
   self::$data['title'] = self::$data['title'] . ' | signin page';
   return view('forms.signin', self::$data);
  }
  
  public function getSignup(){
   
   self::$data['title'] = self::$data['title'] . ' | signup page';
   return view('forms.signup', self::$data);
  }
  
  public function postSignup(SignupRequest $request){
    User::saveUser($request);
    return redirect('user/signin');
  }
  
  public function postSignin(SigninRequest $request){
    
    $des = isset($request['des']) ? $request['des'] : '';
    
   
    if( ! User::validateUser($request['email'], $request['password']) ){
      self::$data['title'] = self::$data['title'] . ' | signin page';
      return view('forms.signin', self::$data)->withErrors('Wrong email/password combination');
        
      }else{
        return redirect($des);
      }
    
  }
  
  public function getLogout() {

    Session::forget('user_id');
    Session::forget('user_name');

    if (Session::has('is_admin')) {

      Session::forget('is_admin');
    }
    
    return redirect('user/signin');
  }

  public function getProfile(){
    echo 'TO DO...';
  }
  
  }

