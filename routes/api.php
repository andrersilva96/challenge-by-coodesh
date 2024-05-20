<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
use App\Http\Api\Food;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['as' => 'api.'], function() {
    Orion::resource('products', Food::class);
});

Route::get('/', \App\Http\Api\GetImport::class);
