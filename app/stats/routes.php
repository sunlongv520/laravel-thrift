<?php
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index'])->middleware('auth');
Route::group(['prefix' => 'stats','middleware' => 'auth'], function () {
    Route::get('/', ['as' => 'stats.test', 'uses' => 'IndexController@index']);
    Route::get('/terminal', ['as' => 'stats.terminal', 'uses' => 'IndexController@terminal']);
    Route::get('/{id}', ['as' => 'stats.show', 'uses' => 'IndexController@show']);

});

Route::group(['prefix' => 'kefu','middleware' =>['auth','CheckPermission']], function () {
    Route::get('/', ['as' => 'kefu.index', 'uses' => 'KefuController@index']);
    Route::get('/{id}', ['as' => 'kefu.show', 'uses' => 'KefuController@show']);
    Route::get('/{id}/edit', ['as' => 'kefu.edit', 'uses' => 'KefuController@edit']);
});


Route::group(['prefix' => 'order','middleware' =>['auth','CheckPermission']], function () {
    Route::get('/', ['as' => 'order.index', 'uses' => 'OrderController@index']);
    Route::get('/create', ['as' => 'order.create', 'uses' => 'OrderController@create']);
    Route::get('/create/xqpg', ['as' => 'order.create-xqpg', 'uses' => 'OrderController@xqpg']);
    Route::get('/{id}', ['as' => 'order.show', 'uses' => 'OrderController@show']);
});



Route::post('/rpc/index', 'RpcController@index')->name('rpc.index');
Route::get('/rpc/test', 'RpcController@test')->name('rpc.test');
