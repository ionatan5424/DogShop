<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\MenuRequest;
use App\Menu;
use Session;


class MenuController extends MainController{
  
    function __construct() {
    parent::__construct();
    $this->middleware('adminLogged');
    }
    
    public function index(){
      
      return view('cms.menu', self::$data);
    }

    public function create(){
      return view('cms.add_menu', self::$data);
    }

    public function store(MenuRequest $request){
      Menu::saveMenu($request);
      return redirect('cms/menu');
    }

    public function show($id){
      self::$data['menu_id'] = $id;
      return view('cms.delete_menu',self::$data);
    }

    public function edit($id) {
        self::$data['menu'] = Menu::find($id)->toArray();
        return view('cms.edit_menu', self::$data);
    }

    public function update(MenuRequest $request, $id) {
     Menu::updateMenu($request, $id);
     return redirect('cms/menu');
    }

    public function destroy($id) {
        Menu::destroy($id);
        Session::flash('sm', 'Menu has been deleted!');
        return redirect('cms/menu');
    }
}
