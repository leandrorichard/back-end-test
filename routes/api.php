<?php

use Illuminate\Http\Request;

Route::resource('produto', 'ProdutoController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
