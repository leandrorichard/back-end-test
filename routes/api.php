<?php

use Illuminate\Http\Request;

//Route::resource('produto', 'ProdutoController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'v1',
    'as' => 'api.v1.'
], function () {

    Route::group([
        'prefix' => 'produto',
        'as' => 'produto.'
    ], function () {

        Route::get('', [
            'as' => 'index',
            'uses' => 'ProdutoController@index'
        ]);

        Route::get('{produto?}', [
            'as' => 'show',
            'uses' => 'ProdutoController@show'
        ]);

        Route::post('', [
            'as' => 'store',
            'uses' => 'ProdutoController@store'
        ]);

        Route::put('{produto}', [
            'as' => 'update',
            'uses' => 'ProdutoController@update'
        ]);

        Route::delete('{produto}', [
            'as' => 'delete',
            'uses' => 'ProdutoController@delete'
        ]);
    });

});
