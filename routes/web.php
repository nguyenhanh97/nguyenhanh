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
Route::pattern('id','([0-9]*)');
Route::get('/', [
    'uses' => 'QuanLi\UserController@index',
    'as'   =>'quanli.user.index'
    ]);
Route::get('/add', [
    'uses' => 'QuanLi\UserController@getadd',
    'as'   =>'quanli.user.add'
]);
Route::post('/add', [
    'uses' => 'QuanLi\UserController@postadd',
    'as'   =>'quanli.user.add'
]);
Route::get('/edit-{id}', [
    'uses' => 'QuanLi\UserController@getedit',
    'as'   =>'quanli.user.edit'
]);
Route::post('/edit-{id}', [
    'uses' => 'QuanLi\UserController@postedit',
    'as'   =>'quanli.user.edit'
]);
Route::get('/del-{id}', [
    'uses' => 'QuanLi\UserController@del',
    'as'   =>'quanli.user.del'
]);

