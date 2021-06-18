<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueryBuilderController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\jqueryPractiseController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', function () {
    return view('welcome');
});




Route::group(['middleware'=>['authmiddleware']],function(){


Route::get("jquery",[jqueryPractiseController::class,'jqueryfunctionindex'])->name('jqueryfunctionindex');


Route::get("student",[StudentController::class,'Index']);
Route::get("show",[QueryBuilderController::class,'getData']);
Route::resource('crud','CrudController');

Route::get("testing",[StudentController::class,'Index']);


Route::get("student/create",[StudentController::class,'Create']);
Route::post("student/store",[StudentController::class,'Store'])->name('student.store');
Route::get("student/show/{id}",[StudentController::class,'show'])->name('student.show');
Route::get("student/edit/{id}",[StudentController::class,'edit'])->name('student.edit');

Route::post("student/update/{id}",[StudentController::class,'updates'])->name('student.update');

Route::get("student/update/{id}",[StudentController::class,'destroy'])->name('student.delete');
});






