<?php
//登录
Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function(){
    Route::get('login', 'AuthController@getLogin');
    Route::post('login', 'AuthController@postLogin');
    Route::get('logout', 'AuthController@getLogout');
// 注册路由...
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');
});

//用户
Route::group([ 'prefix' => 'admin/user','middleware' =>['auth','CheckPermission']], function(){
    Route::get('/',['as' => 'admin.user.index', 'uses' => 'UsersController@index']);
    Route::post('/',['as' => 'admin.user.store', 'uses' => 'UsersController@store']);
    Route::get('/create',['as' => 'admin.user.create', 'uses' => 'UsersController@create']);
    Route::get('/{id}',['as' => 'admin.user.show', 'uses' => 'UsersController@show']);
    Route::put('/{id}',['as' => 'admin.user.update', 'uses' => 'UsersController@update']);
    Route::get('/{id}/edit',['as' => 'admin.user.edit', 'uses' => 'UsersController@edit']);
});

//角色
Route::group([ 'prefix' => 'admin/roles','middleware' =>['auth','CheckPermission']], function(){
    Route::get('/',['as' => 'admin.roles.index', 'uses' => 'RolesController@index']);
    Route::post('/store',['as' => 'admin.roles.store', 'uses' => 'RolesController@store']);
    Route::get('/create',['as' => 'admin.roles.create', 'uses' => 'RolesController@create']);
    Route::get('/{id}',['as' => 'admin.roles.show', 'uses' => 'RolesController@show']);
    Route::put('/{id}',['as' => 'admin.roles.update', 'uses' => 'RolesController@update']);
    Route::get('/{id}/edit',['as' => 'admin.roles.edit', 'uses' => 'RolesController@edit']);
    Route::get('/{id}/addUser/{action?}',['as' => 'admin.roles.adduser', 'uses' => 'RolesController@addUser']);
    Route::get('/{id}/addPerssion',['as' => 'admin.roles.addperssion', 'uses' => 'RolesController@addPerssion']);
    Route::post('/{id}/addPerssion',['as' => 'admin.roles.addperssion', 'uses' => 'RolesController@storePerssion']);

});












