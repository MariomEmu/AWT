<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('students',[StudentController::class,'getData']);
Route::post('/student', [StudentController::class,'storeData']);
Route::put('/student/{id}', [StudentController::class,'updateData']);
Route::delete('/student/{id}', [StudentController::class,'deleteData']);

Route::post('/upload', [StudentController::class,'uploadImage']);