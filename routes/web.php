<?php

use Illuminate\Support\Facades\Route;

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


//FRONTEND
Route::group(['namespace' => 'Frontend'], function(){

    Route::group(['namespace' => 'Auth'], function (){
        Route::get('login','LoginController@getLogin')->name('get.login');
        Route::post('login','LoginController@postLogin');
        Route::get('register','RegisterController@getRegister')->name('get.register');
        Route::post('register','RegisterController@postRegister');
        Route::get('logout','LoginController@getLogout')->name('get.logout');
    });
	 // Trang chủ
	Route::get('','HomeController@index')->name('get.home');

	//  keyword
    Route::get('keyword/{slug}','KeywordController@index')->name('get.keyword');

    // all san pham
    Route::get('san-pham.html','CategoryController@index')->name('get.product');

	// danh muc sp
	Route::get('danh-muc/{slug?}','CategoryController@index')->name('get.category');

	// chi tiet sp
	Route::get('san-pham/{slug}','ProductDetailController@index')->name('get.product_detail');
	Route::post('san-pham/comment/{slug}','ProductDetailController@comment')->name('get.product_detail.comment');

	// menu bai viet
	Route::get('menu/{slug}','MenuController@index')->name('get.menu');
	Route::get('tag/{slug}','TagController@index')->name('get.tag');
    Route::get('bai-viet','ArticleController@index')->name('get.blog');
    Route::get('bai-viet/tim-kiem.html','ArticleController@search')->name('get.blog.search');
	// chi tiet bai viet
	Route::get('bai-viet/{slug}','ArticleDetailController@index')->name('get.article_detail');
	Route::get('cart.html','ShoppingCartController@index')->name('get.shopping');
    Route::post('cart.html','ShoppingCartController@update');
	Route::get('checkout.html','ShoppingCartController@checkout')->name('get.shopping.checkout');
	Route::post('checkout.html','ShoppingCartController@pay');
	Route::get('thong-bao.html','ShoppingCartController@success')->name('get.shopping.success');

    Route::group(['namespace' => 'Ajax','prefix' => 'ajax'], function (){
        Route::get('view-product/{id}','AjaxViewProductController@getPreviewProduct')->name('get_ajax.product_preview');
        Route::get('add/cart/{id}','AjaxShoppingCartController@add')->name('get_ajax.shopping.add');
        Route::get('delete/cart/{id}','AjaxShoppingCartController@delete')->name('get_ajax.shopping.delete');
        Route::get('update/cart/{id}','AjaxShoppingCartController@update')->name('get_ajax.shopping.update');
        Route::post('email','AjaxEmailController@store')->name('post_ajax.email.store');
    });
});


include 'route_admin.php';
include 'route_user.php';
