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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('manager/login', 'Manager\LoginController@getLogin')->name('manager.getLogin');
Route::post('manager/login', 'Manager\LoginController@postLogin')->name('manager.postLogin');

Route::group(['prefix' => 'manager', 'namespace' => 'Manager', 'middleware' => 'manager']
, function () {
    Route::resource('products', 'ProductController');
    Route::resource('product_types', 'ProductTypeController');
    Route::resource('bills', 'BillController');
    Route::get('/home', 'PageController@index')->name('backend.home');
    Route::post('logout', 'LoginController@getLogout')->name('manager.getLogout');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', [
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);
Route::get('product_type/{type}', [
	'as'=>'loai-san-pham',
	'uses'=>'PageController@getProductType'
]);

Route::get('product_detail/{id}', [
	'as'=>'chi-tiet-san-pham',
	'uses'=>'PageController@getProductDetail'
]);

Route::get('contact', [
	'as'=>'lien-he',
	'uses'=>'PageController@getContact'
]);

Route::get('about', [
	'as'=>'gioi-thieu',
	'uses'=>'PageController@getAbout'
]);

Route::get('addToCart/{id}', [
	'as'=>'them-gio-hang',
	'uses'=>'PageController@getAddToCart'
]);

Route::post('addToCart/{id}', [
	'as'=>'them-gio-hang',
	'uses'=>'PageController@postAddToCart'
]);

Route::get('deleteCart/{id}', [
	'as'=>'xoa-gio-hang',
	'uses'=>'PageController@getDeleteItemCart'
]);

Route::get('order', [
	'as'=> 'dat-hang',
	'uses'=>'PageController@getCheckout'
]);

Route::post('order', [
	'as'=>'dat-hang',
	'uses'=>'PageController@postCheckout'
]);

Route::get('login', [
	'as'=>'dang-nhap',
	'uses'=>'PageController@getLogin'
]);

Route::get('signup', [
	'as'=>'dang-ky',
	'uses'=>'PageController@getSignup'
]);

Route::post('signup', [
	'as'=>'dang-ky',
	'uses'=>'PageController@postSignup'
]);

Route::post('login', [
	'as'=>'dang-nhap',
	'uses'=>'PageController@postLogin'
]);

Route::get('logout', [
	'as'=>'dang-xuat',
	'uses'=>'PageController@getLogout'
]);

Route::get('search', [
	'as'=>'tim-kiem',
	'uses'=>'PageController@getSearch'
]);

Route::get('edit', [
	'as'=>'chinh-sua',
	'uses'=>'PageController@getEdit'
]);

Route::post('edit', [
	'as'=>'chinh-sua',
	'uses'=>'PageController@postEdit'
]);

Route::get('sendemail', function () {
	$data = array(
		'name' => "Learning Laravel",
	);

	Mail::send('mail.bill', $data, function ($message) {
		$message->from('tinhhang22@gmail.com', 'Learning Laravel');
		$message->to('tinh.nc96@gmail.com')->subject('Learning Laravel test email');
	});

	return "Your email has been sent successfully";
});

// Route::get('file','FileController@index');
// Route::post('file','Filecontroller@doUpload');