<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\QueryBuilderController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\jqueryPractiseController;
use App\Http\Controllers\GeneralPractiseController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\JsController;
use App\Http\Controllers\AjaxTeacherController;




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


// Route::get('/{locale}', function ($locale) {
//     App::$setlocale();
Route::get('/', function () {
 
    
    return view('welcome');
});



Route::group(['middleware'=>['authmiddleware']],function(){


Route::get("jquery",[jqueryPractiseController::class,'jqueryfunctionindex'])->name('jqueryfunctionindex');

Route::get("Jspractise",[JsController::class,'Jspractise'])->name('Jspractise');
Route::get("jsonpractise",[JsController::class,'jsonCreate'])->name('jsonpractise.create');
Route::post("jsonpractise",[JsController::class,'jsonInsert'])->name('jsonpractise.store');


Route::get("insertRecord",[RelationshipController::class,'insertRecord'])->name('insertRecord');
Route::get("fetchRecordById/{id}",[RelationshipController::class,'fetchRecordById'])->name('fetchRecordById');

Route::get("addpost",[RelationshipController::class,'addpost'])->name('addpost');
Route::get("addcomment/{id}",[RelationshipController::class,'addcomment'])->name('addcomment');
Route::get("getCommentByPost/{id}",[RelationshipController::class,'getCommentByPost'])->name('getCommentByPost');


Route::get("FluentStrings",[GeneralPractiseController::class,'FluentStrings'])->name('FluentStrings');

Route::get("tinyEditor",[GeneralPractiseController::class,'tinyEditor'])->name('tinyEditor');

Route::get("/sendEmails",[GeneralPractiseController::class,'sendEmails'])->name('sendEmails');

Route::get("/sendNotification",[GeneralPractiseController::class,'sendNotification'])->name('sendNotification');

Route::get("/dropzone",[GeneralPractiseController::class,'dropzone'])->name('dropzone');
Route::post("dropzone/store",[GeneralPractiseController::class,'dropzonestore'])->name('dropzone.store');

Route::get("uploadFile/create",[GeneralPractiseController::class,'createFile'])->name('uploadFile.create');
Route::POST("uploadFile/store",[GeneralPractiseController::class,'storeFile'])->name('uploadFile.store');

Route::get("session/allSessionData",[GeneralPractiseController::class,'allSessionData'])->name('session.allSessionData');
Route::get("session/getSessionData",[GeneralPractiseController::class,'getSessionData'])->name('session.getSessionData');
Route::get("session/insertSessionData",[GeneralPractiseController::class,'insertSessionData'])->name('session.insertSessionData');
Route::get("session/deleteSessionData",[GeneralPractiseController::class,'deleteSessionData'])->name('session.deleteSessionData');

Route::get("Images/allImage",[ImageController::class,'allImage'])->name('Images.allImage');
Route::get("Images/addImage",[ImageController::class,'addImage'])->name('Images.addImage');
Route::post("Images/storeImage",[ImageController::class,'storeImage'])->name('Images.storeImage');
Route::get("Images/showImage/{id}",[ImageController::class,'showImage'])->name('Images.showImage');
Route::get("Images/editImage/{id}",[ImageController::class,'editImage'])->name('Images.editImage');
Route::post("Images/updateImage/{id}",[ImageController::class,'updateImage'])->name('Images.updateImage');
Route::get("Images/deleteImage/{id}",[ImageController::class,'deleteImage'])->name('Images.deleteImage');

Route::get("Images/resizeImage",[ImageController::class,'resizeImage'])->name('Images.resizeImage');
Route::post("Images/resizeImageSubmit",[ImageController::class,'resizeImageSubmit'])->name('Images.resizeImageSubmit');
Route::get("Images/lazyImage",[ImageController::class,'lazyImage'])->name('Images.lazyImage');


Route::get("show",[QueryBuilderController::class,'getData']);
Route::resource('crud','CrudController');

// Route::get("testing",[StudentController::class,'Index']);

Route::get("student",[StudentController::class,'Index']);
Route::get("student/create",[StudentController::class,'Create']);
Route::post("student/store",[StudentController::class,'Store'])->name('student.store');
Route::get("student/show/{id}",[StudentController::class,'show'])->name('student.show');
Route::get("student/edit/{id}",[StudentController::class,'edit'])->name('student.edit');
Route::post("student/update/{id}",[StudentController::class,'updates'])->name('student.update');
Route::get("student/delete/{id}",[StudentController::class,'destroy'])->name('student.delete');

Route::get("student/export-excel",[StudentController::class,'exportIntoExcel'])->name('student.export-excel');
Route::get("student/export-csv",[StudentController::class,'exportIntoCsv'])->name('student.export-csv');
Route::get("student/export-pdf",[StudentController::class,'exportIntoPdf'])->name('student.export-pdf');
Route::get("student/importForm",[StudentController::class,'importForm'])->name('student.importForm');
Route::post("student/import",[StudentController::class,'import'])->name('student.import');
Route::get("student/autocompleteSearch",[StudentController::class,'autocompleteSearch'])->name('student.autocompleteSearch');


Route::get("teacher",[AjaxTeacherController::class,'index'])->name('teacher.index');
Route::get("teacher/create",[AjaxTeacherController::class,'create'])->name('teacher.create');
Route::post("teacher/insert",[AjaxTeacherController::class,'insert'])->name('teacher.insert');
Route::get("teacher/{id}",[AjaxTeacherController::class,'getTeacherById']);
Route::put("teacher/update",[AjaxTeacherController::class,'updateTeacher'])->name('teacher.update');
Route::delete("teacher/{id}",[AjaxTeacherController::class,'deleteTeacher'])->name('teacher.delete');

});






