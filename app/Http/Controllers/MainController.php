<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Menu;

class MainController extends Controller 

{
  static public $data = ['title' => 'Dogshop site'];
  
  function __construct() {
    self::$data['menu'] = Menu::all()->toArray(); 
  }
}


