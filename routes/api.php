<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["middleware" => "guest:api"], function () {
    Route::post("/login", "ApiController@login");
});

Route::group(["middleware" => "auth:api"], function () {
    Route::get("/me", "ApiController@me");
    Route::apiResource('/item', 'ApiItemController');
    Route::apiResource('/subitem', 'ApiSubItemController');
});
