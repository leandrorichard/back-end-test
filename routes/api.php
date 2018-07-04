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
            'uses' => 'Produto\IndexController@index'
        ]);

        Route::get('{produto?}', [
            'as' => 'show',
            'uses' => 'Produto\ShowController@show'
        ]);

        Route::post('', [
            'as' => 'store',
            'uses' => 'Produto\CreateController@store'
        ]);

        Route::put('{produto}', [
            'as' => 'update',
            'uses' => 'Produto\UpdateController@update'
        ]);

        Route::delete('{produto}', [
            'as' => 'delete',
            'uses' => 'Produto\DeleteController@delete'
        ]);
    });

    Route::group([
        'prefix' => 'calculos',
        'as' => 'calculos.'
    ], function() {
        Route::get('correios', [
            'as' => 'correios',
            'uses' => 'Calculos\CalculoPrazoController@handle'
        ]);
    });

});
