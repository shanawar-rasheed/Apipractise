<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummpApi;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ResourceController;

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
    return $request->user();
});
Route::get("data",[dummpApi::class,'getData']);

Route::get("device/{id?}",[DeviceController::class,'getDevice']);

Route::post("senddata",[DeviceController::class,'sendData']);

Route::put("updatedata",[DeviceController::class,'updateData']);

Route::delete("deletedata/{id}",[DeviceController::class,'deleteData']);

Route::get("searchdata/{name}",[DeviceController::class,'searchData']);

Route::post("validate",[DeviceController::class,'validateData']);

Route::apiResource("members",ResourceController::class);

