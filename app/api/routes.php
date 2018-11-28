<?php
Route::group(['prefix' => 'api'], function () {
    Route::get('/', ['as' => 'api.index', 'uses' => 'IndexController@index']);
    Route::get('/{id}', ['as' => 'api.show', 'uses' => 'IndexController@show']);
});

