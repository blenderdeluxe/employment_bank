<?php

Route::get('/', ['as'=>'home', function () {
    //return view('welcome');
    return view('admin.layouts.default');
    //return view('errors.503');
}]);

//Route::group(['middleware'=>['auth']], function() {
Route::group(['middleware'=>[]], function() {
	//Masterentries
	 Route::group(['prefix'=>'master', 'namespace'=>'Master'], function() {
		   Route::resource('/industrytypes', 'IndustryTypeController');
	 });

});