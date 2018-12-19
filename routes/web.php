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


Route::get('/testUrl',[
    'uses'=>'TestController@testUrl',
    'as'=>'testUrl'
]);

Route::get('/testSaveUser',[
    'uses'=>'TestController@testSaveUser',
    'as'=>'testSaveUser'
]);

Route::get('/testLogin',[
    'uses'=>'TestController@testLogin',
    'as'=>'testLogin'
]);

Route::get('/testLoggedInUser',[
    'uses'=>'TestController@testLoggedInUser',
    'as'=>'testLoggedInUser'
]);

Route::get('/testCredentialUser',[
    'uses'=>'TestController@testCredentialUser',
    'as'=>'testCredentialUser'
]);

Route::get('/testQueryString/{id?}',[
    'uses'=>'TestController@testQueryString',
    'as'=>'testQueryString'
]);