<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {

    Route::get('user/create', 'Admin\UserController@create');
    Route::get('user/show', 'Admin\UserController@show');//ダッシュボード
    Route::get('user/edit', 'Admin\UserController@edit');//会員情報編集
    Route::post('user/edit', 'Admin\UserController@update'); // 会員情報編集更新
    Route::get('user/product_defect', 'Admin\UserController@product_defect');//訳あり品出品
    Route::get('user/index', 'Admin\UserController@index');//トップページ
    
    Route::get('sell/create', 'Admin\SellController@create');//出品
    Route::post('sell/store', 'Admin\SellController@store'); //保存
    Route::get('sell/index', 'Admin\SellController@index');//出品一覧
    Route::get('sell/edit', 'Admin\SellController@edit');//商品編集
    Route::post('sell/edit', 'Admin\SellController@update');
    Route::get('sell/delete', 'Admin\SellController@delete');
    Route::get('sell/buys_index', 'Admin\SellController@buys_index');//予約購入者一覧
    
     Route::post('buy/store', 'Admin\BuyController@store'); 
    Route::get('buy/index', 'Admin\BuyController@index');//予約購入品一覧
    Route::get('buy/delete', 'Admin\BuyController@delete');
    
    
    Route::get('product/index', 'Admin\ProductController@index');//商品公開
    Route::get('sell/show', 'Admin\SellController@show');//商品詳細
     Route::get('product', 'Admin\ProductController@index');
    
});
    //Route::get('layouts/admin', 'Admin\UserController@add');
    
Route::get('/', 'ProductController@index');

Route::get('/logout', function(){
	Auth::logout();
	return Redirect::to('/');
});


Auth::routes([
    
]);

