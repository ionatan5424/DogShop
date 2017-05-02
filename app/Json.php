<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Json extends Model {

  static public function getJson() {
    $results = DB::select('SELECT categories.title as catTitle,categories.url as catUrl,acquires.title,acquires.url  FROM acquires, categories WHERE acquires.categorie_id =  categories.id');
    return $results;
  }

  
}
