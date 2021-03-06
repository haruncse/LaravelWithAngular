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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/data-save-retrive-by-angular',function(){
	return view('CustomerInfo.customerInfo');
});

Route::get('/customer-info-view-by-design',function(){
	return view('CustomerInfo.customerServiceInfo');
});

Route::get('/data-search-by-suggestion',function(){
	return view('CustomerInfoSearch.customerInfoSearch');
});


Route::get('/home', function () {
    return view('home.home');
});

Route::get('/get-basic-data',function(){
	return ['aaa','bbb','ccc'];
});

Route::post('/post-basic-data/{id}',function($id){
	return $id;
});


Route::resource('/post-basic-data2','AngularDataSaveController');
Route::resource('/customer-info','CustomerInfoController');