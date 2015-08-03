<?php

Route::get('/', function () {
    //return view('welcome');
    return view('admin.layouts.master');
    //return view('errors.503');
});

//Route::group(['middleware'=>['auth']], function() {
Route::group(['middleware'=>[]], function() {
	//Masterentries
	 Route::group(['prefix'=>'master', 'namespace'=>'Master'], function() {
		   Route::resource('/industrytypes', 'IndustryTypeController');
	 });

});
