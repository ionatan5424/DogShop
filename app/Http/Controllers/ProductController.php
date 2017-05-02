<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Categorie; 
use App\Acquire;
use Session;


class ProductController extends MainController{
  
    function __construct() {
    parent::__construct();
    $this->middleware('adminLogged');
    }
    
    public function index(){
      self::$data['acquires'] = Acquire::all()->toArray();
      return view('cms.products', self::$data);
    }

    public function create(){
       self::$data['categories'] = Categorie::all()->toArray(); //will allow categories to be presented in the views
       return view('cms.add_product', self::$data);
    }

    public function store(ProductRequest $request){
      Acquire::saveAcquire($request);
      return redirect('cms/products');
    }

    public function show($id){
      self::$data['acquire_id'] = $id;
      return view('cms.delete_product',self::$data);
    }

    public function edit($id) {
        self::$data['acquire'] = Acquire::find($id)->toArray();
        self::$data['categories'] = Categorie::getAllOrdered( self::$data['acquire']['categorie_id'] );
        //dd(self::$data);
        return view('cms.edit_product', self::$data);
    }

    public function update(ProductRequest $request, $id) {
     Acquire::updatAcquire($request, $id);
     return redirect('cms/products');
    }

    public function destroy($id) {
        Acquire::destroy($id);
        Session::flash('sm', 'Your dog has been removed from the list!');
        return redirect('cms/products');
    }
    
    //public function getSearch(){
    //  return view('forms.search', self::$data);
    //}
}




