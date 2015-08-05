<?php

Route::get('/', ['as'=>'home', function () {
    //return view('welcome');
    return view('admin.layouts.default');
    //return view('errors.503');
}]);

Route::get('test', ['as'=>'test', function () {
    return view('webfront.register');
}]);

//Route::group(['middleware'=>['auth']], function() {
Route::group(['middleware'=>['auth.candidate']], function() {
	//Masterentries
	 Route::group(['prefix'=>'master', 'namespace'=>'Master'], function() {

		   Route::resource('/industrytypes', 'IndustryTypeController', ['except' => ['show']]);
       Route::resource('/departmenttypes', 'DepartmentTypeController', ['except' => ['show']]);
       Route::resource('/exams', 'ExamController', ['except' => ['show']]);
       Route::resource('/boards', 'BoardController', ['except' => ['show']]);
       Route::resource('/subjects', 'SubjectsController', ['except' => ['show']]);
       Route::resource('/languages', 'LanguagesController', ['except' => ['show']]);

	 });
});

//Public webfront routes
Route::get('/register', ['as' => 'webfront.register', 'uses' => 'WebfrontController@showRegister']);
Route::post('/register', ['as' => 'webfront.register', 'uses' => 'WebfrontController@doRegister']);
Route::get('/login', ['as' => 'webfront.login', 'uses' => 'WebfrontController@showlogin']);
Route::post('/login', ['as' => 'webfront.login', 'uses' => 'WebfrontController@dologin']);

Route::controllers([
  //Public webfront routes
	//'ww' => 'WebfrontController'
]);
