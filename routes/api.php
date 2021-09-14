<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\UserAPIController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user()->id;
});

Route::get('/information/{id}', [UserAPIController::class,'getInfomation']);
Route::get('/users', [UserAPIController::class,'searchInfor']);
Route::get('/getBlog', [BlogController::class,'getStore']);

