<?php

/******************** Notes for Routes *******************/

/*Route:GET or POST - for something small - anonomous functions can be used instead of blahblah@blah - only for small projects44334*/
/*Route:Controller - for something small*/
/*Route:RESOURCE - If you want to take advantage of the 4 attrributes Create,Show,Update,Delete*/

                /*End of Routes notes*/

/* Shop */
Route::get('shop', 'ShopController@categories');
Route::get('shop/order', 'ShopController@saveOrder');
Route::get('shop/checkout', 'ShopController@checkout');
Route::get('shop/cart-clear', 'ShopController@cartClear');
Route::get('shop/add-to-cart', 'ShopController@addToCart');
Route::get('shop/update-cart', 'ShopController@updateCart');
Route::get('shop/{category_url}', 'ShopController@acquires');
Route::get('shop/{category_url}/{acquire_url}', 'ShopController@item');

/* User */
Route::controller('user', 'UserController');

/* CMS */
Route::resource('cms/products', 'ProductController');
Route::resource('cms/categories', 'CategoryController');
Route::resource('cms/content', 'ContentController');
Route::resource('cms/menu', 'MenuController');
Route::controller('cms', 'CmsController'); 


/* Pages */
Route::get('/', 'PagesController@index');
Route::get('{url}', 'PagesController@boot');

Route::get('content/json', 'ShopController@getJson');
