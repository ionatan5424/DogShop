<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Categorie;
use Session;


class JsonController extends MainController{
  
    function __construct() {
    parent::__construct();

    }
    
    public function getJson() {
      self::$data['json'] = Json::all()->toJson();
      return view('content.json', self::$data);
    }


}
